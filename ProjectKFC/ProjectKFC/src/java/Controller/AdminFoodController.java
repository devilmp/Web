/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Model.MonAnModel;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Phuong
 */
public class AdminFoodController extends HttpServlet {

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
//            out.println("<title>Servlet AdminFoodController</title>");            
//            out.println("</head>");
//            out.println("<body>");
//            out.println("<h1>Servlet AdminFoodController at " + request.getContextPath() + "</h1>");
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
    public String dosomethingwithItem(String item)
    {
        return (item.equals("GÀ RÁN "))?"GÀ RÁN & GÀ QUAY":((item.equals("TRÁNG MIỆNG "))?"TRÁNG MIỆNG & THỨC UỐNG":item);
    }
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //processRequest(request, response);
        request.setCharacterEncoding("UTF-8");
        response.setCharacterEncoding("UTF-8");
        String task = request.getParameter("task");
        HttpSession session = request.getSession();
        MonAnModel mam = new MonAnModel();
        PrintWriter out = response.getWriter();
        if (task.equals("Tìm")) {
            try {
                String item = request.getParameter("id");
                item = this.dosomethingwithItem(item);
                ResultSet rs = mam.getStockGroup();
                int count = 0;
                int result = 0;
                while (rs.next()) {
                    if (rs.getString("MANHOM").equals(item) || rs.getString("TENNM").equals(item) || rs.getString("TENMON").equals(item) || rs.getString("MAMON").equals(item)) {
                        if (count == 0) {

                            out.println("<tr><td colspan='7' class='list_title'>" + rs.getString("TENNM") + "</td></tr>");
                            out.println("<tr>"
                                    + "<td class='title_infor'>"
                                    + "<div class='select_all'>"
                                    + "<input class='select_all_food' type='checkbox' name='select_all_food' value='checkall'/> CHỌN HẾT"
                                    + "</div>"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "MÃ MÓN ĂN"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "TÊN MÓN ĂN"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "MÃ NHÓM MÓN"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "GIÁ"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "TỒN KHO"
                                    + "</td>"
                                    + "<td class='title_infor'>"
                                    + "HÌNH ẢNH"
                                    + "</td>"
                                    + "</tr>");
                            out.println("<tr>"
                                    + "<td class='infor'>"
                                    + "<input class='select_food' type='checkbox' name='select_food' value='" + rs.getString("MANHOM") + "'/> Chọn"
                                    + "</td>"
                                    + "<td class='infor id'>" + rs.getString("MAMON") + "</td>"
                                    + "<td class='infor name'>" + rs.getString("TENMON") + "</td>"
                                    + "<td class='infor group_id'>" + rs.getString("MANHOM") + "</td>"
                                    + "<td class='infor food_cost'>" + rs.getInt("GIA") + " Đ</td>"
                                    + "<td class='infor stock_amount'>" + rs.getInt("TINHTRANG") + "</td>"
                                    + "<td class='infor image'>"
                                    + "<img src='" + rs.getString("HINHANH") + "' alt='" + rs.getString("MAMON") + "'/>"
                                    + "</td>"
                                    + "</tr>");
                            count++;
                        } else {
                            out.println("<tr>"
                                    + "<td class='infor'>"
                                    + "<input class='select_food' type='checkbox' name='select_food' value='" + rs.getString("MANHOM") + "'/> Chọn"
                                    + "</td>"
                                    + "<td class='infor id'>" + rs.getString("MAMON") + "</td>"
                                    + "<td class='infor name'>" + rs.getString("TENMON") + "</td>"
                                    + "<td class='infor group_id'>" + rs.getString("MANHOM") + "</td>"
                                    + "<td class='infor food_cost'>" + rs.getInt("GIA") + " Đ</td>"
                                    + "<td class='infor stock_amount'>" + rs.getInt("TINHTRANG") + "</td>"
                                    + "<td class='infor image'>"
                                    + "<img src='" + rs.getString("HINHANH") + "' alt='" + rs.getString("MAMON") + "'/>"
                                    + "</td>"
                                    + "</tr>");
                        }
                        result++;
                    }
                }
                if(result == 0)
                    out.println("Không tìm thấy thông tin này!");
            } catch (SQLException ex) {
                Logger.getLogger(AdminFoodController.class.getName()).log(Level.SEVERE, null, ex);
            }

        }
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
        if (task.equals("Xác Nhận Thêm")) {
            String food_name = request.getParameter("txtTenMonAn");
            String food_group = request.getParameter("slt_kind_of_food");
            String food_image = request.getParameter("txtHinhAnh");
            int food_price = Integer.parseInt(request.getParameter("txtGia"));
            int food_amount = Integer.parseInt(request.getParameter("txtSoLuong"));
            MonAnModel md = new MonAnModel();
            int result = 0;
            try {
                result = md.addNewFood(food_group, food_name, food_amount, food_price, food_image);
                if (result > 0) {
                    request.setAttribute("announce", "Success");
                } else {
                    request.setAttribute("announce", "Fail");
                }
            } catch (SQLException ex) {
                Logger.getLogger(AdminFoodController.class.getName()).log(Level.SEVERE, null, ex);
                request.setAttribute("announce", "SQLException occur!");
            }
        }
        if (task.equals("Xác Nhận Lưu Thay Đổi")) {
            String food_id = request.getParameter("txtMaMonAn");
            String food_name = request.getParameter("txtTenMonAn_edit");
            String food_group = request.getParameter("slt_kind_of_food_edit");
            String food_image = request.getParameter("txtHinhAnh_edit");
            int food_price = Integer.parseInt(request.getParameter("txtGia_edit"));
            int food_amount = Integer.parseInt(request.getParameter("txtSoLuong_edit"));
            MonAnModel md = new MonAnModel();
            int result = 0;
            try {
                result = md.updateFood(food_id, food_group, food_name, food_amount, food_price, food_image);
                if (result > 0) {
                    request.setAttribute("announce", "Success");
                } else {
                    request.setAttribute("announce", "Fail");
                }
            } catch (SQLException ex) {
                Logger.getLogger(AdminFoodController.class.getName()).log(Level.SEVERE, null, ex);
                request.setAttribute("announce", "SQLException occur!");
            }
        }
        if (task.equals("Xóa Món Ăn")) {
            String[] list_delete = request.getParameterValues("select_food");
            MonAnModel md = new MonAnModel();
            int result = 0;
            for (int i = 0; i < list_delete.length; i++) {
                try {
                    result += md.deleteFood(list_delete[i]);
                } catch (SQLException ex) {
                    Logger.getLogger(AdminFoodController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                }
            }
            if (result == list_delete.length) {
                request.setAttribute("announce", "Success");
            } else {
                request.setAttribute("announce", "Fail");
            }
        }
        request.setAttribute("go_back", "Admin_Foods.jsp");
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
