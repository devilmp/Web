<%-- 
    Document   : Admin_Foods
    Created on : Dec 7, 2014, 3:00:57 PM
    Author     : Phuong
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="Model.MonAnModel"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <title>Admin - Foods</title>
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
        <script type="text/javascript" src="Javascript/find_ajax.js"></script>
        <script src="editor/ckeditor.js" language="javascript"></script>
    </head>
    <body>
        <div class="KFC">
            <!--Begin Top-->
            <div class="top">
            </div>
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
                <div class="center">
                    <div class="small">
                        <div class="dn">
                            Đăng Nhập
                        </div>
                        <div class="dn">
                            Username:
                            <input type="text" name="username"/>
                        </div>
                        <div class="dn">
                            Password:
                            <input type="text" name="username"/> 
                        </div >
                        <div class="dn">
                            <input type="submit" name="dangnhapAd" value="Login"/>
                        </div>
                    </div>
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
            <div>
                <div class="abc">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
