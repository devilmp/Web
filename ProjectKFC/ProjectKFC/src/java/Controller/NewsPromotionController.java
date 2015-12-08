/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import Beans.TinTucBean;
import Model.TinTucModel;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.SQLException;
import java.util.StringTokenizer;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Phuong
 */
public class NewsPromotionController extends HttpServlet {

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
//            out.println("<title>Servlet NewsPromotionController</title>");            
//            out.println("</head>");
//            out.println("<body>");
//            out.println("<h1>Servlet NewsPromotionController at " + request.getContextPath() + "</h1>");
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
        int ID = Integer.parseInt(request.getParameter("id"));
        TinTucModel ttm = new TinTucModel();
        TinTucBean tintuc = new TinTucBean();
        try {
            tintuc = ttm.getNewsPromotionByID(ID);
        } catch (SQLException ex) {
            Logger.getLogger(NewsPromotionController.class.getName()).log(Level.SEVERE, null, ex);
        }
        request.setAttribute("tieude", tintuc.getTieuDe());
        request.setAttribute("noidung", tintuc.getNoiDung());
        request.setAttribute("hinhanh", tintuc.getHinhAnh());
        request.getRequestDispatcher("NewsPromote.jsp").forward(request, response);
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    public String getMoTa(StringTokenizer tkz) {
        while (tkz.hasMoreTokens()) {
            return tkz.nextToken();
        }
        return null;
    }

    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        //processRequest(request, response);
        request.setCharacterEncoding("UTF-8");
        String task = request.getParameter("task");
        TinTucModel ttm = new TinTucModel();
        if (task.equals("Xác Nhận Thêm")) {
            TinTucBean tintuc = new TinTucBean();
            tintuc.setTieuDe(request.getParameter("txtTenBanTin"));
            tintuc.setLoaiTinTuc(request.getParameter("slt_news_promotion"));
            tintuc.setHinhAnh(request.getParameter("txtHinhAnh"));
            String noidung = request.getParameter("txtnoidung");
            String motangan = new String();
            StringTokenizer tkz = new StringTokenizer(noidung, ".");
            motangan = this.getMoTa(tkz);
            tintuc.setNoiDung(noidung);
            tintuc.setMoTaNgan(motangan);
            int result = 0;
            try {
                result = ttm.addNewsPromotion(tintuc);
                if (result > 0) {
                    request.setAttribute("announce", "Success");
                } else {
                    request.setAttribute("announce", "Fail");
                }
            } catch (SQLException ex) {
                Logger.getLogger(NewsPromotionController.class.getName()).log(Level.SEVERE, null, ex);
                request.setAttribute("announce", "SQLException occur!");
            }
            request.setAttribute("go_back", "Admin_News_Promotion.jsp");
            request.getRequestDispatcher("Server Announce.jsp").forward(request, response);
        }
        if (task.equals("Xóa Tin Tức")) {
            String[] list_delete = request.getParameterValues("select_tintuc");
            int result = 0;
            for (int i = 0; i < list_delete.length; i++) {
                try {
                    result += ttm.deleteNewsPromotion(Integer.parseInt(list_delete[i]));
                } catch (SQLException ex) {
                    Logger.getLogger(NewsPromotionController.class.getName()).log(Level.SEVERE, null, ex);
                    request.setAttribute("announce", "SQLException occur!");
                }
            }
            if (result == list_delete.length) {
                request.setAttribute("announce", "Success");
            } else {
                request.setAttribute("announce", "Fail");
            }
            request.setAttribute("go_back", "Admin_News_Promotion.jsp");
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
