<%-- 
    Document   : Admin_Orders
    Created on : Dec 23, 2014, 2:30:56 PM
    Author     : Phuong
--%>

<%@page import="Model.MonAnModel"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="Model.DonDatHangModel"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <title>Admin - Sale Order</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/top.css" />
        <link rel="stylesheet" type="text/css" href="css/menu_top.css" />
        <link rel="stylesheet" type="text/css" href="css/left_content.css" />
        <link rel="stylesheet" type="text/css" href="css/right_content.css" />
        <link rel="stylesheet" type="text/css" href="css/center_content.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <link rel="stylesheet" type="text/css" href="css/food_menu_page.css" />
        <link rel="stylesheet" type="text/css" href="css/dialog.css" />
        <link rel="stylesheet" type="text/css" href="css/choosed_menu.css" />
        <link rel="stylesheet" type="text/css" href="css/admin_foods.css" />
        <link rel="stylesheet" type="text/css" href="css/about.css" />
        <script type="text/javascript" src="Javascript/jquery-latest.js"></script>
        <script type="text/javascript" src="Javascript/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="Javascript/Menu.js"></script>
        <script type="text/javascript" src="Javascript/dialog.js"></script>
        <script type="text/javascript" src="Javascript/read_url.js"></script>
        <script type="text/javascript" src="Javascript/edit_food.js"></script>
        <script type="text/javascript" src="Javascript/check_all.js"></script>
    </head>
    <body>
        <div class="KFC">
            <!--Begin Top-->
            <div class="top">
                <div class="bar">
                    <div class="user">
                        <img src="images/Home/navigation.jpg" alt="navigation"/>
                        <select class="at_bar">
                            <option>Hồ Chí Minh</option>
                            <option>Đồng Nai</option>
                            <option>Bình Dương</option>
                            <option>Vũng Tàu</option>
                            <option>Cần Thơ</option>
                        </select>
                        <%
                            if ((String) session.getAttribute("user") != null) {
                                out.println("<a href='#' class='sign_in'>" + session.getAttribute("user") + "</a>");
                                out.println("<a href = 'AccountController?location=Admin_Orders'>" + "Đăng xuất" + "</a>");

                            } else {
                                out.println("<a href='Member.jsp' class='sign_in'>" + "Đăng ký" + "</a>");
                                out.println("<a href = '#login-box' class = 'log_in'>" + "Đăng nhập" + "</a>");
                            }
                        %>
                        <div class="login" id="login-box">
                            <div class="log_in_title">ĐĂNG NHẬP</div>

                            <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="images/Home/close.png" /></a>
                            <form class="login-content" action="AccountController" method="post">
                                <label class="username">
                                    <span>Tên đăng nhập</span>
                                    <input id="username" type="text" autocomplete="on" name="username" placeholder="Username" value="" />
                                </label>
                                <label class="password">
                                    <span>Mật khẩu</span>
                                    <input id="password" type="password" name="password" placeholder="Password" value="" />
                                </label>

                                <a class="forgot" href="#">Quên mật khẩu?</a>
                                <br/>
                                <div class="action">
                                    <button class="button submit-button" type="submit" name="location" value="Admin_Orders">Đăng nhập</button>
                                    <button class="button facebook-button" type="button">Facebook</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="language">
                        <a href="#"><img src="images/Home/VN.jpg" alt="VN"/></a>
                        <a href="#"><img src="images/Home/EN.jpg" alt="EN"/></a>
                    </div>
                </div>
                <div class="logo_kfc"><a href="Home.jsp"><img src="images/Home/KFC.png" alt="logo"/></a></div>
                <div class="menu_top">
                    <ul class="menu">
                        <li><a href="About_KFC.jsp">GIỚI THIỆU</a></li>
                        <li><a href="Menu.jsp">THỰC ĐƠN</a></li>
                        <li><a href="Member.jsp">THÀNH VIÊN</a></li>
                        <li><a href="Promote.jsp">KHUYẾN MÃI</a></li>
                        <li><a href="#">NGHỀ NGHIỆP</a></li>
                        <li><a href="News.jsp">TIN TỨC</a></li>
                        <li><a href="#">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </div>
            <!--End Top-->
            <div class="clr"></div>

            <!--Content-->
            <div class="content">
                <!--Left content-->
                <div class="left_content">
                    <table bgcolor="white">
                        <tr>
                            <td class="a">
                                &nbsp
                            </td>
                            <td class="b">
                                &nbsp
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2" class="c">
                                &nbsp
                            </td>
                        </tr>
                        <tr>
                            <td  colspan="2" class="d">
                                &nbsp
                            </td>
                        </tr>
                    </table>
                </div>

                <!--Center content-->
                <div class="center_content">
                    <table cellspacing="4" bgcolor="white" class="adv_center">
                        <tr>
                            <td rowspan="2" colspan="3" class="adv_menu_page">
                                <div class="around_trans_box">
                                    <div class="about_menu_transbox">
                                        <div class="title_menu"><p>Khu Quản Trị</p></div>
                                        <hr>
                                        <a href="Admin_Foods.jsp">Món Ăn</a>
                                        <hr>
                                        <a href="#">Quản Trị Website</a>
                                        <hr>
                                        <a href="Admin_Orders.jsp" class="location">Đơn Đặt Hàng & Hóa Đơn</a>
                                        <hr>
                                        <a href="#">Khách Hàng</a>
                                        <hr>
                                        <a href="Admin_News_Promotion.jsp">Khác</a>
                                    </div>
                                </div>
                            </td>
                            <td  class="find_pos">
                                <img src="images/Home/find_kfc.png" alt="find restaurant"/>
                                <div class="find_nearest">TÌM NHÀ HÀNG<br> GẦN NHẤT</div>
                                <select class="slt_adv">
                                    <optgroup label="Tỉnh/ Thành Phố">
                                        <option>Hồ Chí Minh</option>
                                        <option>Đồng Nai</option>
                                        <option>Bình Dương</option>
                                        <option>Vũng Tàu</option>
                                        <option>Cần Thơ</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#"style="width:228px; height:232px; display:block; position:absolute; z-index:1"></a>
                                <div class="for-pc" id="flashContent">
                                    <a href="#">
                                        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="228" height="232" id="230x200_v4" align="middle" class="pull-left">
                                            <param name="movie" value="http://kfcvietnam.com.vn/templates/flash/230x200_v4_vn.swf" />
                                            <param name="quality" value="high" />
                                            <param name="bgcolor" value="#ffffff" />
                                            <param name="play" value="true" />
                                            <param name="loop" value="true" />
                                            <param name="wmode" value="transparent" />
                                            <param name="scale" value="exactfit" />
                                            <param name="menu" value="true" />
                                            <param name="devicefont" value="false" />
                                            <param name="salign" value="" />
                                            <param name="allowScriptAccess" value="sameDomain" />
                                            <!--[if !IE]>-->
                                            <object type="application/x-shockwave-flash" data="http://kfcvietnam.com.vn/templates/flash/230x200_v4_vn.swf" width="228" height="232">
                                                <param name="movie" value="http://kfcvietnam.com.vn/templates/flash/230x200_v4_vn.swf" />
                                                <param name="quality" value="high" />
                                                <param name="bgcolor" value="#ffffff" />
                                                <param name="play" value="true" />
                                                <param name="loop" value="true" />
                                                <param name="wmode" value="transparent" />
                                                <param name="scale" value="exactfit" />
                                                <param name="menu" value="true" />
                                                <param name="devicefont" value="false" />
                                                <param name="salign" value="" />
                                                <param name="allowScriptAccess" value="sameDomain" />
                                            </object>
                                            <!--<![endif]-->
                                        </object>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <!--Right content-->
                <div class="right_content">
                    <table bgcolor="white">
                        <tr>
                            <td colspan="2" class="g">
                                &nbsp
                            </td>
                        </tr>
                        <tr>
                            <td class="h">
                                &nbsp
                            </td>
                            <td class="i">
                                &nbsp
                            </td>
                        </tr>
                        <tr>
                            <td class="k">
                                &nbsp
                            </td>
                            <td class="l"
                                &nbsp
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="clr"></div>


        <div class="menu_page">

            <div class="bar_menu_page">
                <ul class="bar_food">
                    <li class="active" id="area1"><a href="#task1">XEM DANH SÁCH ĐƠN ĐẶT HÀNG</a></li>
                    <li id="area2"><a href="#task2">XEM DANH SÁCH HÓA ĐƠN</a></li>
                </ul>
            </div>
            <div class="table_menu">
                <%
                    DonDatHangModel ddhm = new DonDatHangModel();
                    MonAnModel mam = new MonAnModel();
                    ResultSet rs = null;
                    ResultSet rs1 = null;
                    rs = ddhm.getOrderList();
                    rs1 = mam.getStock();
                %>

                <section id="task1" class="tab-content active">
                    <form action="OrderController" method="post">
                        <table CLASS="stocked">
                            <tr>
                                <td colspan="7" class="list_title">
                                    ĐƠN ĐẶT HÀNG
                                </td>
                            </tr>
                            <tr>
                                <td class="title_infor">
                                    <div class="select_all">
                                        <%--
                                        <input class="select_all_food" type="checkbox" name="select_all_food" value="checkall"/> CHỌN HẾT
                                        --%>
                                    </div>
                                </td>
                                <td class="title_infor">
                                    MÃ ĐƠN ĐẶT HÀNG
                                </td>
                                <td class="title_infor">
                                    KHÁCH HÀNG
                                </td>
                                <td class="title_infor">
                                    NGÀY ĐẶT 
                                </td>
                                <td class="title_infor">
                                    TRỊ GIÁ
                                </td>
                                <td class="title_infor image">
                                    TRẠNG THÁI
                                </td>
                            </tr>
                            <%
                                rs = ddhm.getOrderList();
                                while (rs.next()) {
                            %> 
                            <tr>

                                <td class="infor">
                                    <input type="checkbox" name="select_order" value="<%=rs.getInt("MADDH")%>"/> Chọn
                                </td>
                                <td class="infor id"><%=rs.getInt("MADDH")%></td>
                                <td class="infor name"><%=rs.getString("TENKH")%></td>
                                <td class="infor group_id"><%=rs.getDate("NGAYDAT")%></td>
                                <td class="infor food_cost"><%=rs.getInt("TRIGIA")%> Đ</td>
                                <% if (rs.getInt("TRANGTHAI") == 0) {
                                %>
                                <td class="infor stock_amount">Chưa Thanh Toán</td>
                                <%} else {%>
                                <td class="infor stock_amount">Đã Thanh Toán</td>
                                <%}%>
                            </tr>
                            <%}%>

                        </table>
                        <div class="task_option">
                            <div class="option">
                                <input type="submit" class="submit" name="task" value="Xóa Đơn Đặt Hàng"/>
                            </div>
                            <div class="option">
                                <input type="submit" class="submit" name="task" value="Tạo Hóa Đơn"/>
                            </div>
                        </div>
                    </form>
                </section>

                <section id="task2" class="tab-content hide">
                    <form action="OrderController" method="post">
                        <table CLASS="stocked">
                            <tr>
                                <td colspan="7" class="list_title">
                                    HÓA ĐƠN
                                </td>
                            </tr>
                            <tr>
                                <td class="title_infor">
                                    <div class="select_all">
                                        <%--
                                        <input class="select_all_food" type="checkbox" name="select_all_invoice" value="checkall"/> CHỌN HẾT
                                        --%>                                        
                                    </div>
                                </td>
                                <td class="title_infor">
                                    SỐ HÓA ĐƠN
                                </td>
                                <td class="title_infor">
                                    MÃ ĐƠN ĐẶT HÀNG
                                </td>
                                <td class="title_infor">
                                    NHÂN VIÊN 
                                </td>
                                <td class="title_infor">
                                    NGÀY XUẤT
                                </td>
                                <td class="title_infor image">
                                    TRỊ GIÁ
                                </td>
                            </tr>
                            <%
                                rs = ddhm.getCustomersInvoices();
                                while (rs.next()) {
                            %> 
                            <tr>

                                <td class="infor">
                                    <input type="checkbox" name="select_invoice" value="<%=rs.getInt("SOHD")%>"/> Chọn
                                </td>
                                <td class="infor id"><%=rs.getInt("SOHD")%></td>
                                <td class="infor name"><%=rs.getString("MADDH")%></td>
                                <td class="infor name"><%=rs.getString("MANV")%></td>
                                <td class="infor group_id"><%=rs.getDate("NGAYXUAT")%></td>
                                <td class="infor food_cost"><%=rs.getInt("TRIGIA")%> Đ</td>
                            </tr>
                            <%}%>

                        </table>
                        <div class="task_option">
                            <div class="option">
                                <input type="submit" width="1300" class="submit1" name="task" value="Xóa Hóa Đơn"/>
                            </div>
                        </div>
                    </form>
                </section>            
            </div>
        </div>


        <div class="clr"></div>

        <!--Footer-->
        <div class="footer">
            <img src="images/Home/bottom_image.png" class="giao_hang" alt="giao_hang"/>
            <img src="images/Home/top_footer_bg.png" class="bg" alt="giao_hang"/>
            <div class="menu_footer">
                <ul class="references">
                    <li class="owner"><a href="Home.jsp">Trang chủ</a></li>
                    <li class="owner"><a href="#">Nhà hàng</a></li>
                    <li class="owner"><a href="#">Đăng ký nhận thông tin</a></li>
                    <li class="developer"><a href="#">UIT IS07 IS216.F12 Group 9</a></li>
                    <li>
                        <a href="#"><img src="images/Home/facebook.png" alt="facebook"/></a>
                        <a href="#"><img src="images/Home/zing.png" alt="zing"/></a>
                        <a href="#"><img src="images/Home/youtube.jpg" alt="youtube"/></a>
                    </li>
                </ul>
            </div>
            <div class="facebook">
                <table>
                    <tr>
                        <td rowspan="2">
                            <a href="#"><img src="images/Home/plug_in_facebook.png" alt="plug_in"/></a>
                        </td>
                        <td class="checked" >
                            <a href="#">KFC</a>
                            <sub><a href="#"><img src="images/Home/checked.png" alt="checked"/></a></sub>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="#"><img src="images/Home/facebook_like.png" alt="youtube"/></a>
                        </td>
                    </tr>
                </table>
                <hr>
                <div class="social"><a href="#">KFC</a></div>

                <br>
                <br>

                <div class="social">
                    <a href="#"><img src="images/Home/plug_in_facebook.png" alt="plug_in"/></a>
                    <a href="#"><img src="images/Home/plug_in_facebook.png" alt="plug_in"/></a>
                    <a href="#"><img src="images/Home/plug_in_facebook.png" alt="plug_in"/></a>
                    <a href="#"><img src="images/Home/plug_in_facebook.png" alt="plug_in"/></a>
                </div>
                <hr>
                <div class="social">
                    <a href="#"><img src="images/Home/facebook.png" class="plug" alt="facebook"/></a>
                    <sup><a class="plug_in" href="#">Plugin xã hội của Facebook</a></sup>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
