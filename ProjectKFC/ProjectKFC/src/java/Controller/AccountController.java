/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Beans.KhachHangBean;
import Model.KhachHangModel;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
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
public class AccountController extends HttpServlet {

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
//            out.println("<title>Servlet AccountController</title>");            
//            out.println("</head>");
//            out.println("<body>");
//            out.println("<h1>Servlet AccountController at " + request.getContextPath() + "</h1>");
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
        HttpSession session = request.getSession();
        session.setAttribute("id", null);
        session.setAttribute("user", null);
        String location = request.getParameter("location")+".jsp";
        request.getRequestDispatcher(location).forward(request, response); 
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
        String task = request.getParameter("location");
        if (task.equals("Đăng ký")) {
            KhachHangBean khb = new KhachHangBean();
            KhachHangModel khm = new KhachHangModel();
            String username = request.getParameter("ten_dang_nhap");
            khb.setTAIKHOAN(username);
            String password = request.getParameter("mat_khau");
            khb.setMATKHAU(password);
            String name = request.getParameter("ho_ten");
            khb.setTENKH(name);
            int date_birth = Integer.parseInt(request.getParameter("date"));
            int month_birth = Integer.parseInt(request.getParameter("month"));
            int year_birth = Integer.parseInt(request.getParameter("year"));
            khb.setNGAYSINH(date_birth, month_birth, year_birth);
            String gen = request.getParameter("gender");
            int gender = (gen.equals("Nam")) ? 1 : 0;
            khb.setGIOITINH(gender);
            String email = request.getParameter("e-mail");
            khb.setEMAIL(email);
            String diachi = request.getParameter("diachi");
            khb.setDIACHI(diachi);
            String tinh = request.getParameter("tinh");
            khb.setTINH(tinh);
            String tp = request.getParameter("thanh_pho");
            khb.setTP(tp);
            String sdt = request.getParameter("sdt");
            khb.setSDT(sdt);
            int result = 0;
            try {
                result = khm.addCustomer(khb);
                if (result > 0) {
                    request.setAttribute("announce", "Success");
                } else {
                    request.setAttribute("announce", "Fail");
                }
            } catch (SQLException ex) {
                Logger.getLogger(AccountController.class.getName()).log(Level.SEVERE, null, ex);
                request.setAttribute("announce", "SQLException occur!");
            }
            request.setAttribute("go_back", "Member.jsp");
        }
        else {
            HttpSession session = request.getSession();
            String location = task + ".jsp";
            String taikhoan = request.getParameter("username");
            String matkhau = request.getParameter("password");
            KhachHangModel md = new KhachHangModel();
            int result = 0;
            try {
                result = md.checkAccount(taikhoan, matkhau);
                if (result != 0) {
                    session.setAttribute("MAKH", result);
                    session.setAttribute("user", taikhoan);
                    request.getRequestDispatcher(location).forward(request, response);
                } else {
                    request.getRequestDispatcher("Member.jsp").forward(request, response);
                }
            } catch (SQLException ex) {
                Logger.getLogger(AccountController.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
        request.setAttribute("go_back", "Member.jsp");
        request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
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
