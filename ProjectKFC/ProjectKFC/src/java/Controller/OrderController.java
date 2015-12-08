/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Beans.DonDatHangBean;
import Beans.GioHangBean;
import Model.DonDatHangModel;
import Model.KhachHangModel;
import Model.MonAnModel;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Phuong
 */
public class OrderController extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
//    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
//            throws ServletException, IOException {
//        response.setContentType("text/html;charset=UTF-8");
//        try (PrintWriter out = response.getWriter()) {
//            /* TODO output your page here. You may use following sample code. */
//            out.println("<!DOCTYPE html>");
//            out.println("<html>");
//            out.println("<head>");
//            out.println("<title>Servlet OrderController</title>");            
//            out.println("</head>");
//            out.println("<body>");
//            out.println("<h1>Servlet OrderController at " + request.getContextPath() + "</h1>");
//            out.println("</body>");
//            out.println("</html>");
//        }
//    }
    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //processRequest(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //processRequest(request, response);
        request.setCharacterEncoding("UTF-8");
        String task = request.getParameter("task");
        HttpSession session = request.getSession();
        GioHangBean ghb;
        ArrayList<GioHangBean> giohang;
        giohang = (ArrayList<GioHangBean>) session.getAttribute("giohang");
        MonAnModel md = new MonAnModel();
        DonDatHangBean ddhb = new DonDatHangBean();
        KhachHangModel khm = new KhachHangModel();
        DonDatHangModel ddhm = new DonDatHangModel();
        if (task.equals("Đặt Hàng")) {
            int result = 0;
            for (int i = 0; i < giohang.size(); i++) {
                try {
                    if (!(md.checkStockOfFood(giohang.get(i)))) {
                        request.setAttribute("announce", giohang.get(i).getTenmon() + " is out of stock!");
                        request.setAttribute("go_back", "Menu.jsp");
                        request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
                    } else {
                        result++;
                    }
                } catch (SQLException ex) {
                    Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                    request.setAttribute("go_back", "Menu.jsp");
                    request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
                }
            }
            int sum = 0;
            int rs = 0;
            int rs1 = 0;
            if (giohang.size() == result) {
                try {
                    ddhb.setMADDH(ddhm.getCurrentID());
                    if (session.getAttribute("MAKH") == null) {
                        ddhb.setMAKH(khm.getCurrentVirtualID());
                        result = khm.addVirtualCustomer();
                    } else {
                        ddhb.setMAKH(Integer.parseInt(session.getAttribute("MAKH").toString()));
                    }
                    for (int i = 0; i < giohang.size(); i++) {
                        sum += giohang.get(i).getGia() * giohang.get(i).getSL();
                    }
                    ddhb.setTriGia(sum);
                    ddhb.setTrangThai(0);
                    rs = ddhm.addOrder(ddhb);
                    for (int i = 0; i < giohang.size(); i++) {
                        rs1 += ddhm.addOrderDetails(ddhb, giohang.get(i).getMamon(), giohang.get(i).getSL(), 1);
                    }
                    if (rs <= 0 || rs1 < giohang.size()) {
                        request.setAttribute("announce", "Error!");
                        request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
                    } else {
                        session.setAttribute("MAKH", result);
                        session.setAttribute("DOANHSO", sum);
                        session.setAttribute("MADDH", ddhb.getMADDH());
                        request.getRequestDispatcher("Order.jsp").forward(request, response);
                    }
                } catch (SQLException ex) {
                    Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "Error!");
                    request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
                }
            }
        }
        if (task.equals("Gửi")) {
            int makh = Integer.parseInt(session.getAttribute("MAKH").toString());
            int doanhso = Integer.parseInt(session.getAttribute("DOANHSO").toString());
            int maddh = Integer.parseInt(session.getAttribute("MADDH").toString());
            String hoten = request.getParameter("ho_ten");
            String diachi = request.getParameter("address");
            String khuvuc = request.getParameter("area");
            String email = request.getParameter("e-mail");
            String sdt = request.getParameter("sdt");
            khm = new KhachHangModel();
            try {
                int result = khm.updateCustomer(makh, maddh, hoten, diachi, khuvuc, sdt, email, doanhso);
                if (result > 0) {
                    request.setAttribute("announce", "Your order was confirmed!");
                } else {
                    request.setAttribute("announce", "Please try again!");
                }
            } catch (SQLException ex) {
                Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                request.setAttribute("announce", "An error has occurred!");
            }
            request.setAttribute("go_back", "Menu.jsp");
            request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
        }
        if (task.equals("Tạo Hóa Đơn")) {
            int result = 0;
            String[] list_order = request.getParameterValues("select_order");
            for (int i = 0; i < list_order.length; i++) {
                try {
                    result += ddhm.createFinalInvoice(Integer.parseInt(list_order[i]));
                } catch (SQLException ex) {
                    Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                }
            }
            if (result == list_order.length) {
                request.setAttribute("announce", "Success");
            } else {
                request.setAttribute("announce", "Fail");
            }
            request.setAttribute("go_back", "Admin_Orders.jsp");
            request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
        }
        if (task.equals("Xóa Đơn Đặt Hàng")) {
            int result = 0;
            String[] list_delete = request.getParameterValues("select_order");
            for(int i=0;i<list_delete.length;i++)
            {
                try {
                    result += ddhm.deleteOrder(Integer.parseInt(list_delete[i]));
                } catch (SQLException ex) {
                    Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                }
            }
            if (result == list_delete.length) {
                request.setAttribute("announce", "Success");
            } else {
                request.setAttribute("announce", "Fail");
            }
            request.setAttribute("go_back", "Admin_Orders.jsp");
            request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
        }
        if (task.equals("Xóa Hóa Đơn")) {
            int result = 0;
            String[] list_delete = request.getParameterValues("select_invoice");
            for(int i=0;i<list_delete.length;i++)
            {
                try {
                    result +=ddhm.deleteInvoiceByID(Integer.parseInt(list_delete[i]));
                } catch (SQLException ex) {
                    Logger.getLogger(OrderController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                }
            }
            if (result == list_delete.length) {
                request.setAttribute("announce", "Success");
            } else {
                request.setAttribute("announce", "Fail");
            }
            request.setAttribute("go_back", "Admin_Orders.jsp");
            request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
