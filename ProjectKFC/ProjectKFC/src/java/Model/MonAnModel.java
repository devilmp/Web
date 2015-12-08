/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Model;
import Beans.GioHangBean;
import Beans.MonAnBean;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.*;
/**
 *
 * @author Phuong
 */
public class MonAnModel {
    
    PreparedStatement stm;
    ResultSet rs;
    public ResultSet getStock() throws SQLException
    {
        String command = "select * from MONAN order by MANHOM ASC";
        stm = Connect.GetConnect().prepareStatement(command);
        rs = stm.executeQuery();
        return rs;
    }
    
    public boolean checkStockOfFood(GioHangBean ghb) throws SQLException
    {
        String sql = "select TINHTRANG from MONAN where MAMON='"+ghb.getMamon()+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int stock = 0;
        boolean result = true;
        while(rs.next())
        {
            stock = rs.getInt("TINHTRANG");
            result = (stock <= 0)?false:((stock >= ghb.getSL())?true:false);
            if(result == false)
                return result;
        }
        return result;
    }
    
    public ResultSet getGroups() throws SQLException
    {
        String command = "select * from NHOMMON";
        stm = Connect.GetConnect().prepareStatement(command);
        rs = stm.executeQuery();
        return rs;
    }
    
    public ResultSet getStock(String manhommon) throws SQLException
    {
        String command = "select * from MONAN where MANHOM = '"+manhommon+"' order by MANHOM ASC";
        stm = Connect.GetConnect().prepareStatement(command);
        rs = stm.executeQuery();
        return rs;
    }
    
    public ResultSet getStockGroup() throws SQLException
    {
        String sql = "select * from MONAN join NHOMMON on MONAN.MANHOM = NHOMMON.MANHOM";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    
    public int getNumberFromString(String mamonan)
    {
        int result = 0;
        StringTokenizer tk = new StringTokenizer(mamonan,"MA");
            while(tk.hasMoreTokens())
                result = Integer.parseInt(tk.nextToken());
        return result;
    }
    
    public int getCurrentId() throws SQLException
    {
        String sql = "select MAMON from MONAN order by MAMON ASC";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int current_id = 1;
        while(rs.next())
        {
            if(this.getNumberFromString(rs.getString("MAMON")) != current_id)
                return current_id;
            else
                current_id++;
        }
        return current_id;
    }
    
    public ResultSet getFoodGroup(String group_name) throws SQLException
    {
        String sql = "select MANHOM from NHOMMON where TENNM = N'"+group_name+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        return rs;
    }
    
    public String getFoodGroupName(String group_id) throws SQLException
    {
        String sql = "select TENNM from NHOMMON where MANHOM = '"+group_id+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        String result = null;
        while(rs.next())
            result = rs.getString("TENNM");
        return result;
    }
    
    public String getImgeGroupFolder(String group_name)
    {
        String image_folder = "images/Menu/";
        switch(group_name)
        {
            case "PHẦN ĂN COMBO":
            {
                image_folder += "Combo/";
                break;
            }
            case "GÀ RÁN & GÀ QUAY":
            {
                image_folder += "Fried_roasted_chicken/";
                break;
            }
            case "BURGER - CƠM":
            {
                image_folder += "Burger_rice/";
                break;
            }
            case "THỨC ĂN NHẸ":
            {
                image_folder += "Snack/";
                break;
            }
            case "TRÁNG MIỆNG & THỨC UỐNG":
            {
                image_folder += "Dessert_drink/";
                break;
            }
        }
        return image_folder;
    }
    
    public int addNewFood(String tennhommon, String tenmonan, int tinhtrang, int gia, String tenhinhanh) throws SQLException
    {
        //declare 3 variable
        String mamonan = null;
        String manhommon = null;
        String hinhanh = null;
        //Set id, group's id, full path image
//        mamonan = "MA00" + String.valueOf(getCurrentId()+1);
        int curr_id = this.getCurrentId();
        if(curr_id >= 100)
            mamonan = "MA" + curr_id;
        else
        {
            if(curr_id >= 10)
                mamonan = "MA0" + curr_id;
            else
                mamonan = "MA00" + curr_id;
        }
        rs = this.getFoodGroup(tennhommon);
        while(rs.next())
            manhommon = rs.getString("MANHOM");
        hinhanh = this.getImgeGroupFolder(tennhommon) + tenhinhanh;
        
        //insert to database
        String sql = "INSERT INTO MONAN VALUES('"+mamonan+"','"+manhommon+"',N'"+tenmonan+"',"+gia+","+tinhtrang+",'"+hinhanh+"')";
        stm = Connect.GetConnect().prepareStatement(sql); 
        return stm.executeUpdate();
        
    }
    
    public int deleteFood(String mamonan) throws SQLException
    {
        String sql = "Delete from MONAN where MAMON = '"+mamonan+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int updateFood(String mamonan,String tennhommon, String tenmonan, int tinhtrang, int gia, String tenhinhanh) throws SQLException
    {
        String manhommon = null;
        String hinhanh = null;
        rs = this.getFoodGroup(tennhommon);
        while(rs.next())
            manhommon = rs.getString("MANHOM");
        hinhanh = this.getImgeGroupFolder(tennhommon) + tenhinhanh;
        String sql = "Update MONAN "
                + "set MANHOM ='"+manhommon+"', "
                + "TENMON =N'"+tenmonan+"', "
                + "GIA ="+gia+", "
                + "TINHTRANG ="+tinhtrang+", "
                + "HINHANH ='"+hinhanh+"' where MAMON='"+mamonan+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }

}
