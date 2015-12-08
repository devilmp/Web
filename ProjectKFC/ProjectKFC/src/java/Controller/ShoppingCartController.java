/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Controller;

import Beans.GioHangBean;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Phuong
 */
public class ShoppingCartController extends HttpServlet {

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
//            out.println("<title>Servlet ShoppingCartController</title>");            
//            out.println("</head>");
//            out.println("<body>");
//            out.println("<h1>Servlet ShoppingCartController at " + request.getContextPath() + "</h1>");
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
        HttpSession session = request.getSession();
        String task = request.getParameter("task");
        String id = null;
        String name = null;
        int gia = 0;
        GioHangBean ghb;
        ArrayList<GioHangBean> giohang;
        giohang = (ArrayList<GioHangBean>) session.getAttribute("giohang");
        if(task.equals("add"))
        {
            id = request.getParameter("id");
            name = request.getParameter("name");
            gia = Integer.parseInt(request.getParameter("price"));
            ghb = new GioHangBean();
            ghb.setMaMonan(id); 
            ghb.setSL(1);
            ghb.setGia(gia);
            ghb.setTenMonan(name);
            if(giohang == null)
            {
                giohang = new ArrayList();
                giohang.add(ghb);
            }
            else
            {
                int temp=0;
                int count=0;
                for(int i = 0;i<giohang.size();i++)
                {
                    if(giohang.get(i).getMamon().equals(ghb.getMamon()))
                    {
                        temp = giohang.get(i).getSL();
                        giohang.get(i).setSL(temp+1); 
                        count++;
                    }
                }
                if(count==0)
                    giohang.add(ghb);
            }
        }
        if(task.equals("more"))
        {
            int temp = 0;
            id = request.getParameter("id");
            for (int i = 0; i < giohang.size(); i++) {
                if (giohang.get(i).getMamon().equals(id)) {
                    temp = giohang.get(i).getSL();
                    giohang.get(i).setSL(temp + 1);
                }
            }
        }
        if(task.equals("less"))
        {
            int temp = 0;
            id = request.getParameter("id");
            for (int i = 0; i < giohang.size(); i++) {
                if (giohang.get(i).getMamon().equals(id)) {
                    temp = giohang.get(i).getSL();
                    giohang.get(i).setSL(temp - 1);
                }
            }
        }
        if(task.equals("delete"))
        {
            id = request.getParameter("id");
            for(int i =0;i<giohang.size();i++)
            {
                if(giohang.get(i).getMamon().equals(id))
                    giohang.remove(i);
            }
        }
        session.setAttribute("giohang", giohang);
        response.setCharacterEncoding("UTF-8");
        PrintWriter out = response.getWriter();
        
        for(int i=0;i<giohang.size();i++)
        {
            out.println("<div class='order_item' id='item-" +giohang.get(i).getMamon() + "'>"
                    + "<div class='close'><button type='button'>&#215</button></div>"
                    + "<div class='item_name'><input type='text' class='item_name_readonly'"
                    + " name ='" + giohang.get(i).getMamon()
                    + "' value='" + giohang.get(i).getTenmon()+ "' readonly='readonly'></div>"
                    + "<div class='amount'>"
                    + "<div class='increase'><button type='button' class='more'>&#8743</button></div>"
                    + "<div class='nums_of_item'><input type='text' class='item_amount_readonly' name ='item_amount' value='"
                    + giohang.get(i).getSL()+ "' readonly='readonly'/></div>"
                    + "<div class='descrease'><button type='button' class='less'>&#8744</button></div>"
                    + "</div>"
                    + "<div class='price'>" + giohang.get(i).getGia() + "</div><div class='unit'>&nbsp đ</div>"
                    + "</div>");
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
