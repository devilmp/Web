package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import java.sql.ResultSet;
import Model.MonAnModel;

public final class Admin_005fLogin_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html;charset=UTF-8");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("\n");
      out.write("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\n");
      out.write("    \"http://www.w3.org/TR/html4/loose.dtd\">\n");
      out.write("\n");
      out.write("<html>\n");
      out.write("    <head>\n");
      out.write("        <title>Admin - Foods</title>\n");
      out.write("        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/top.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/menu_top.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/left_content.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/right_content.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/center_content.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/footer.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/food_menu_page.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/dialog.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/choosed_menu.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/admin_foods.css\" />\n");
      out.write("        <link rel=\"stylesheet\" type=\"text/css\" href=\"css/about.css\" />\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/jquery-latest.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/jquery-1.7.2.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/Menu.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/dialog.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/read_url.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/edit_food.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/check_all.js\"></script>\n");
      out.write("        <script type=\"text/javascript\" src=\"Javascript/find_ajax.js\"></script>\n");
      out.write("        <script src=\"editor/ckeditor.js\" language=\"javascript\"></script>\n");
      out.write("    </head>\n");
      out.write("    <body>\n");
      out.write("        <div class=\"KFC\">\n");
      out.write("            <!--Begin Top-->\n");
      out.write("            <div class=\"top\">\n");
      out.write("            </div>\n");
      out.write("            <div class=\"clr\"></div>\n");
      out.write("            <!--Content-->\n");
      out.write("            <div class=\"content\">\n");
      out.write("                <!--Left content-->\n");
      out.write("                <div class=\"left_content\">\n");
      out.write("                    <table bgcolor=\"white\">\n");
      out.write("                        <tr>\n");
      out.write("                            <td class=\"a\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                            <td class=\"b\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                        </tr>\n");
      out.write("                        <tr>\n");
      out.write("                            <td  colspan=\"2\" class=\"c\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                        </tr>\n");
      out.write("                        <tr>\n");
      out.write("                            <td  colspan=\"2\" class=\"d\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                        </tr>\n");
      out.write("                    </table>\n");
      out.write("                </div>\n");
      out.write("                <!--Center content-->\n");
      out.write("                <div class=\"center\">\n");
      out.write("                    <div class=\"small\">\n");
      out.write("                        <div class=\"dn\">\n");
      out.write("                            Đăng Nhập\n");
      out.write("                        </div>\n");
      out.write("                        <div class=\"dn\">\n");
      out.write("                            Username:\n");
      out.write("                            <input type=\"text\" name=\"username\"/>\n");
      out.write("                        </div>\n");
      out.write("                        <div class=\"dn\">\n");
      out.write("                            Password:\n");
      out.write("                            <input type=\"text\" name=\"username\"/> \n");
      out.write("                        </div >\n");
      out.write("                        <div class=\"dn\">\n");
      out.write("                            <input type=\"submit\" name=\"dangnhapAd\" value=\"Login\"/>\n");
      out.write("                        </div>\n");
      out.write("                    </div>\n");
      out.write("                </div>\n");
      out.write("                <!--Right content-->\n");
      out.write("                <div class=\"right_content\">\n");
      out.write("                    <table bgcolor=\"white\">\n");
      out.write("                        <tr>\n");
      out.write("                            <td colspan=\"2\" class=\"g\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                        </tr>\n");
      out.write("                        <tr>\n");
      out.write("                            <td class=\"h\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                            <td class=\"i\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                        </tr>\n");
      out.write("                        <tr>\n");
      out.write("                            <td class=\"k\">\n");
      out.write("                                &nbsp\n");
      out.write("                            </td>\n");
      out.write("                            <td class=\"l\"\n");
      out.write("                                &nbsp\n");
      out.write("                        </td>\n");
      out.write("                    </tr>\n");
      out.write("                </table>\n");
      out.write("            </div>\n");
      out.write("            <div>\n");
      out.write("                <div class=\"abc\">\n");
      out.write("                </div>\n");
      out.write("            </div>\n");
      out.write("        </div>\n");
      out.write("    </div>\n");
      out.write("</body>\n");
      out.write("</html>\n");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
