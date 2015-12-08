<%-- 
    Document   : About_KFC
    Created on : Dec 11, 2014, 5:04:36 AM
    Author     : Phuong
--%>

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
        <link rel="stylesheet" type="text/css" href="css/about.css" />
        <link rel="stylesheet" type="text/css" href="css/dialog.css" />
        <script type="text/javascript" src="Javascript/jquery.min.js"></script>
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
                            if ((String) session.getAttribute("user") != null) {
                                out.println("<a href='#' class='sign_in'>" + session.getAttribute("user") + "</a>");
                                out.println("<a href = 'AccountController?location=About_KFC'>" + "Đăng xuất" + "</a>");

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
                                    <button class="button submit-button" type="submit" name="location" value="About_KFC">Đăng nhập</button>
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
                        <li><a class="location" href="About_KFC.jsp">GIỚI THIỆU</a></li>
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
                                        <div class="title_menu"><p>GIỚI THIỆU</p></div>
                                        <hr>
                                        <a href="About_KFC.jsp" class="location">KFC VIỆT NAM</a>
                                        <hr>
                                        <a href="Yum.jsp">TẬP ĐOÀN YUM</a>
                                        <hr>
                                        <a href="#">LỊCH SỬ HÌNH THÀNH KFC</a>
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

        <div class="top_about">
            <div class="owner">
                <p>KFC VIỆT NAM</p>
            </div>
        </div>

        <table cellspacing="25" class="about">
            <tr>
                <td>
                    KFC là cụm từ viết tắt của Kentucky Fried Chicken - Gà Rán Kentucky,
                    một trong các thương hiệu thuộc Tập đoàn Yum Brands Inc (Hoa Kỳ).
                    KFC chuyên về các sản phẩm gà rán và nướng, với các món ăn kèm
                    theo và các loại sandwiches chế biến từ thịt gà tươi. Hiện nay đang có
                    hơn 20.000 nhà hàng KFC tại 109 quốc gia và vùng lãnh thổ trên toàn
                    thế giới.
                    <br>
                    <br>
                    KFC nổi tiếng thế giới với công thức chế biến gà rán truyền thống
                    Original Recipe, được tạo bởi cùng một công thức pha trộn bí mật 11
                    loại thảo mộc và gia vị khác nhau do Đại tá Harland Sanders hoàn thiện
                    hơn nửa thế kỷ trước. Ngoài thực đơn gà rán, KFC còn đa dạng hóa
                    sản phẩm tạo nên thực đơn vô cùng phong phú dành cho người tiêu
                    dùng trên toàn thế giới có thể thưởng thức hơn 300 món ăn khác nhau
                    từ món gà nướng tại thị trường Việt Nam cho tới sandwich cá hồi tại
                    Nhật Bản.
                </td>
                <td>
                    <img src="images/About/about_KFC1.png" alt="about1" class="img_table"/>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/About/about_KFC2.png" alt="about2" class="img_table"/>
                </td>
                <td rowspan="2">
                    Bên cạnh những món ăn truyền thống như gà rán và Bơ-gơ, đến với thị
                    trường Việt Nam, KFC đã chế biến thêm một số món để phục vụ những
                    thức ăn hợp khẩu vị người Việt như: Gà Big‘n Juicy, Gà Giòn Không
                    Xương, Cơm Gà KFC, Bắp Cải Trộn … Một số món mới cũng đã được
                    phát triển và giới thiệu tại thị trường Việt Nam, góp phần làm tăng thêm
                    sự đa dạng trong danh mục thực đơn, như: Bơ-gơ Tôm, Lipton, Bánh
                    Egg Tart.
                    <br>
                    <br>
                    Năm 1997, KFC đã khai trương nhà hàng đầu tiên tại Thành phố Hồ Chí
                    Minh. Đến nay, hệ thống các nhà hàng của KFC đã phát triển tới hơn
                    140 nhà hàng, có mặt tại hơn 19 tỉnh/thành phố lớn trên cả nước,
                    sử dụng hơn 3.000 lao động đồng thời cũng tạo thêm nhiều việc làm trong
                    ngành công nghiệp bổ trợ tại Việt Nam.
                    <br>
                    <br>
                    <br>
                    <div class="moc">
                        <div class="moc_title">CÁC CỘT MỐC PHÁT TRIỂN NHÀ HÀNG ĐẦU TIÊN TẠI CÁC TỈNH THÀNH</div>
                        <br>
                        <ul class="cot_moc">
                            <li><p>Tháng 12/1997 - TP.HCM</p></li>
                            <li><p>Tháng 12/1998 – Đồng Nai</p></li>
                            <li><p>Tháng 06/2006 – Hà Nội</p></li>
                            <li><p>Tháng 08/2006 – Hải Phòng & Cần Thơ</p></li>
                            <li><p>Tháng 01/2008 – Vũng Tàu</p></li>
                            <li><p>Tháng 05/2008 - Huế</p></li>
                            <li><p>Tháng 12/2008 – Buôn Ma Thuột</p></li>
                            <li><p>Tháng 11/2009 – Đà Nẵng</p></li>
                            <li><p>Tháng 04/2010 – Bình Dương</p></li>
                            <li><p>Tháng 11/2010 - TP. Vinh</p></li>
                            <li><p>Tháng 05/2011 - TP. Nha Trang</p></li>
                            <li><p>Tháng 06/2011 - Long Xuyên</p></li>
                            <li><p>Tháng 08/2011 - Quy Nhơn & Rạch Giá</p></li>
                            <li><p>Tháng 09/2011 - Phan Thiết</p></li>
                            <li><p>Tháng 12/2011 – Hải Dương</p></li>
                            <li><p>Tháng 02/2013 - Hạ Long</p></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <img src="images/About/about_KFC3.png" alt="about3" class="img_table"/>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    Hương vị độc đáo, phong cách phục vụ thân thiện, hết lòng vì khách
                    hàng và bầu không khí nồng nhiệt, ấm cúng tại các nhà hàng là ba chìa
                    khóa chính mở cánh cửa thành công của KFC tại Việt Nam cũng như
                    trên thế giới. KFC Việt Nam đã tạo nên một nét văn hóa ẩm thực mới và
                    đóng góp to lớn vào sự phát triển của ngành công nghiệp thức ăn nhanh
                    tại Việt Nam.
                </td>
                <td>
                    <img src="images/About/about_KFC4.png" alt="about4" class="img_table"/>
                </td>
            </tr>
        </table>

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
