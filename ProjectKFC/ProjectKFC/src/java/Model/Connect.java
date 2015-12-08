/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Model;

import java.sql.Connection;
import java.sql.Driver;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
/**
 *
 * @author Phuong
 */
public class Connect {

    public static Connection GetConnect() throws SQLException {
        Connection conn = null;
        try {
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            String url = "jdbc:sqlserver://DUYPHUONG:1433;databaseName=KFC";
            String username = "sa";
            String password = "123456";
            conn = DriverManager.getConnection(url,username,password);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(Connect.class.getName()).log(Level.SEVERE, null, ex);
        }
        return conn;
    }
    public static void main(String[] args) throws SQLException {
        if(GetConnect()!= null)
            System.out.println("ok");
        else
            System.out.print("fail");
                 
            
    }
}
