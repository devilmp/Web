<%--
    Document   : Menu
    Created on : Dec 2, 2014, 12:25:37 PM
    Author     : Phuong
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="Model.*" %>
<%@page import="Beans.MonAnBean" %>
<%@page import="Beans.GioHangBean" %>
<%@page import="java.sql.ResultSet" %>
<%@page import="java.util.*" %>
<%@page import="javax.servlet.ServletException" %>
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <title>PHẦN ĂN COMBO</title>
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
        <script type="text/javascript" src="Javascript/jquery-latest.js"></script>
        <script type="text/javascript" src="Javascript/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="Javascript/Menu.js"></script>
        <script type="text/javascript" src="Javascript/dialog.js"></script>
        <script type="text/javascript" src="Javascript/choosed_menu.js"></script>
        <script type="text/javascript" src="Javascript/add_to_cart_ajax.js"></script>


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
                            if ((String)session.getAttribute("user") != null) {
                                out.println("<a href='#' class='sign_in'>" + session.getAttribute("user") + "</a>");
                                out.println("<a href = 'AccountController?location=Menu'>" + "Đăng xuất" + "</a>");
                                
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
                                    <button class="button submit-button" type="submit" name="location" value="Menu">Đăng nhập</button>
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
                        <li><a class="location" href="Menu.jsp">THỰC ĐƠN</a></li>
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
                                <img src="images/Menu/combo.jpg" class="adv_menu_page_img" alt="menu_center_top"/>
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
                        <li class="active"><a href="#menu1">PHẦN ĂN COMBO</a></li>
                        <li><a href="#menu2">GÀ RÁN & GÀ QUAY</a></li>
                        <li><a href="#menu3">BURGER - CƠM</a></li>
                        <li><a href="#menu4">THỨC ĂN NHẸ</a></li>
                        <li><a href="#menu5">TRÁNG MIỆNG & THỨC UỐNG</a></li>
                    </ul>
                </div>


                <div class="table_menu">
                    <section id="menu1" class="tab-content active">
                        <div class="table_food">

                            <% ResultSet thucdon;
                                MonAnModel td = new MonAnModel();
                                thucdon = td.getStock("NH01");
                                if (thucdon != null) {
                                    while (thucdon.next()) {
                                        if (thucdon.getInt("TINHTRANG") == 0) {
                            %>
                            <div class="food">
                                <div class="food_state">Hết</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="food">
                                <div class="food_state">Còn hàng</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%          }
                                    }
                                }
                            %>
                        </div>
                    </section>


                    <section id="menu2" class="tab-content hide">
                        <div class="table_food">
                            <% thucdon = td.getStock("NH02");
                                while (thucdon.next()) {
                                    if (thucdon.getInt("TINHTRANG") == 0) {
                            %>
                            <div class="food">
                                <div class="food_state">Hết</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="food">
                                <div class="food_state">Còn hàng</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                                    }
                                }
                            %>
                        </div>
                    </section>

                    <section id="menu3" class="tab-content hide">
                        <div class="table_food">
                            <% thucdon = td.getStock("NH03");
                                while (thucdon.next()) {
                                    if (thucdon.getInt("TINHTRANG") == 0) {
                            %>
                            <div class="food">
                                <div class="food_state">Hết</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="food">
                                <div class="food_state">Còn hàng</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                                    }
                                }
                            %>
                        </div>
                    </section>

                    <section id="menu4" class="tab-content hide">
                        <div class="table_food">
                            <% thucdon = td.getStock("NH04");
                                while (thucdon.next()) {
                                    if (thucdon.getInt("TINHTRANG") == 0) {
                            %>
                            <div class="food">
                                <div class="food_state">Hết</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="food">
                                <div class="food_state">Còn hàng</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                                    }
                                }
                            %>
                        </div>
                    </section>

                    <section id="menu5" class="tab-content hide">
                        <div class="table_food">
                            <% thucdon = td.getStock("NH05");
                                while (thucdon.next()) {
                                    if (thucdon.getInt("TINHTRANG") == 0) {
                            %>
                            <div class="food">
                                <div class="food_state">Hết</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                            } else {
                            %>
                            <div class="food">
                                <div class="food_state">Còn hàng</div>
                                <a href="#choosed-food" class="food_image">
                                    <img src="<%=thucdon.getString("HINHANH")%>" id="<%=thucdon.getString("MAMON")%>" alt="<%=thucdon.getInt("GIA")%>"/></a>
                                <div class="food_name"><%=thucdon.getString("TENMON")%></div>
                            </div>
                            <%
                                    }
                                }
                            %>
                        </div>
                    </section>
                    <%
                        HttpSession sess = request.getSession();
                        ArrayList<GioHangBean> giohang;
                        giohang = (ArrayList<GioHangBean>) sess.getAttribute("giohang");
                        int sum = 0;
                    %>
                    <form name="frmOrder" method="post" action="OrderController" id="ordered_food">
                        <div class="order_cart">
                            <div class="picked_foods">
                                Phần Ăn Đã Chọn
                            </div>
                            <div class="delivery_infor">
                                <i>Chúng tôi nhận giao hàng từ</i> <strong>08:00</strong> đến <strong>21:00</strong>
                            </div>

                            <div class="detail_order" id="list_items">
                                <%
                                    if (giohang != null) {
                                        for (int i = 0; i < giohang.size(); i++) {
                                %>
                                <div class="order_item" id="item-<%=giohang.get(i).getMamon()%>">
                                    <div class="close"><button type="button">&#215</button></div>
                                    <div class="item_name"><input type="text" class="item_name_readonly" name ="<%=giohang.get(i).getMamon()%>" value="<%=giohang.get(i).getTenmon()%>" readonly="readonly"></div>
                                    <div class="amount">
                                        <div class="increase"><button type="button" class="more"><div class="increase_more">&#8743</div></button></div>
                                        <div class="nums_of_item"><input type="text" class="item_amount_readonly" name ="item_amount" value="<%=giohang.get(i).getSL()%>" readonly="readonly"/></div>
                                        <div class="descrease"><button type="button" class="less"><div class="decrease_less">&#8744</div></button></div>
                                    </div>
                                    <div class="price"><%=giohang.get(i).getGia()%></div><div class="unit">&nbsp đ</div>
                                </div>
                                <% sum += giohang.get(i).getGia() * giohang.get(i).getSL();
                                        }
                                    }
                                %>
                            </div>

                            <div class="note">
                                <strong>Ghi chú</strong><br>
                                _ <i>Đơn hàng tối thiểu 80.000đ</i><br>
                                _ <i>Miễn phí giao hàng</i>
                            </div>

                            <div class="cost">
                                <div class="sum">Tổng:</div>
                                <div class="money"><label type="text" name="paid"><%=sum%></label>đ</div>
                            </div>
                            <div class="order">
                                <input type="submit" name="task" value="Đặt Hàng"/>
                            </div>
                        </div>
                    </form>


                </div>      
                <div id="choosed-food" class="choosed">
                    <div class="image_food_area" id="choosed">
                        <div class="prev_menu"><a href="#"><img src="images/Menu/Choosed/previous_meal.png" alt="Previous meal"/></a></div>
                        <div class="food_img">
                            <img name="choosed_img" src="images/Menu/Combo/ga-gion-cay.png" alt="ga gion cay"/>
                        </div>
                        <div class="next_menu"><a href="#"><img src="images/Menu/Choosed/next_meal.png" alt="Next meal"/></a></div>
                    </div>
                    <div class="food_info_choose">
                        <div class="food-info">
                            <div class="food-name">
                                <input type="text" class="choosed_name_readonly" name ="choosed-food-name" value="tên món ăn" readonly="readonly"/>
                            </div>
                            <a href="#" class="close"><img src="images/Menu/Choosed/close.png" class="image-close" alt="close"/></a>
                            <div class="food-detail">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li><li>
                                </ul>
                            </div>
                            <div class="food-price">
                                <div class="food-price-title">GIÁ: </div>
                                <div class="food-cost">79000</div><div class="food-cost-title">đ</div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="add-to-cart" id="selected_item">CHỌN</button>
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
                <div class="social"> <a href="#">KFC</a></div>

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