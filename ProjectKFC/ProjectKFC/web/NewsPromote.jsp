<%-- 
    Document   : NewsPromote
    Created on : Dec 15, 2014, 8:12:30 PM
    Author     : Phuong
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="Model.TinTucModel"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <title>TEAM UIT IS07 IS216.F12 Group 9</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="css/top.css" />
        <link rel="stylesheet" type="text/css" href="css/menu_top.css" />
        <link rel="stylesheet" type="text/css" href="css/left_content.css" />
        <link rel="stylesheet" type="text/css" href="css/right_content.css" />
        <link rel="stylesheet" type="text/css" href="css/center_content.css" />
        <link rel="stylesheet" type="text/css" href="css/footer.css" />
        <link rel="stylesheet" type="text/css" href="css/food_menu_page.css" />
        <link rel="stylesheet" type="text/css" href="css/promote_news.css" />
        <link rel="stylesheet" type="text/css" href="css/slide_show.css" />
        <link rel="stylesheet" type="text/css" href="css/promote_news_slide_show.css" />
        <link rel="stylesheet" type="text/css" href="css/dialog.css" />
        <link rel="stylesheet" type="text/css" href="css/promote_news_details.css" />
        <script type="text/javascript" src="Javascript/jquery.min.js"></script>
        <script type="text/javascript" src="Javascript/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="Javascript/Slide_show.js"></script>
        <script language="javascript" src="Javascript/Menu.js"></script>
        <script type="text/javascript" src="Javascript/dialog.js"></script>
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
                                out.println("<a href = 'AccountController?location=NewsPromote'>" + "Đăng xuất" + "</a>");
                                
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
                                    <button class="button submit-button" type="submit" name="location" value="NewsPromote">Đăng nhập</button>
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
                                <div class="slide-stage">
                                    <div class="slide-image"><a href="#"><img src="images/Home/Slide/99k.png"/></a></div>
                                    <div class="slide-image"><a href="#"><img src="images/Home/Slide/ga_lan_bot.jpg"/></a></div>
                                    <div class="slide-image"><a href="#"><img src="images/Home/Slide/hot_wheels.png"/></a></div>
                                    <div class="slide-image"><a href="#"><img src="images/Home/Slide/KM.png"/></a></div>
                                    <div class="slide-image"><a href="#"><img src="images/Home/Slide/menu30k.png"/></a></div>
                                </div>
                                <div class="slide-pager">
                                    <ul></ul>
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
                                <a href="#"style="width:228px; height:233px; display:block; position:absolute; z-index:1"></a>
                                <div class="for-pc" id="flashContent">
                                    <a href="#">
                                        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="228" height="233" id="230x200_v4" align="middle" class="pull-left">
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
                                            <object type="application/x-shockwave-flash" data="http://kfcvietnam.com.vn/templates/flash/230x200_v4_vn.swf" width="228" height="233">
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




        <div class="_body">

            <div class="news_promo_details">
                <div class="news_promo_title">
                    <%= request.getAttribute("tieude")%>
                </div>
                <div class="news_promo_content">
                    <%= request.getAttribute("noidung")%>
                </div>
                <div class="share_like">
                    <a href="#">
                        <div class="share">
                            Chia sẻ
                        </div>
                    </a>

                    <a href="#">
                        <div class="like">
                            <a href="#">&hearts;</a> 0
                        </div>
                    </a>
                </div>
            </div>

            <div class="clr"></div>

            <div class="_news">
                <% TinTucModel ttm = new TinTucModel();
                    ResultSet rs = ttm.getNews();
                    ResultSet rs_p = ttm.getPromotion();
                %>
                <div class="_body">

                    <div class="_news">

                        <% while (rs.next()) {
                        %>
                        <div class="big_area">
                            <img src="<%= rs.getString("HINHANH")%>" width="228" height="326"/>
                            <div class="short_detail">
                                <div class="_info">
                                    <div class="_title">
                                        <%= rs.getString("TIEUDE")%>
                                    </div>

                                    <div class="_short">
                                        <%= rs.getString("MOTANGAN")%>
                                    </div>

                                    <div class="_view_more">
                                        <a href="NewsPromotionController?id=<%= rs.getString("MATINTUC")%>">XEM THÊM</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="share_like">
                                    <a href="#">
                                        <div class="share">
                                            Chia sẻ
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="like">
                                            <a href="#">&hearts;</a> 0
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <% }
                        %>
                        
                        <% while (rs_p.next()) {
                        %>
                        <div class="big_area">
                            <img src="<%= rs_p.getString("HINHANH")%>" width="228" height="326"/>
                            <div class="short_detail">
                                <div class="_info">
                                    <div class="_title">
                                        <%= rs_p.getString("TIEUDE")%>
                                    </div>

                                    <div class="_short">
                                        <%= rs_p.getString("MOTANGAN")%>
                                    </div>

                                    <div class="_view_more">
                                        <a href="NewsPromotionController?id=<%= rs_p.getString("MATINTUC")%>">XEM THÊM</a>
                                    </div>
                                </div>

                                <hr>

                                <div class="share_like">
                                    <a href="#">
                                        <div class="share">
                                            Chia sẻ
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="like">
                                            <a href="#">&hearts;</a> 0
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <% }
                        %>

                    </div>
                </div>
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
