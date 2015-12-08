/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Model;
import Beans.DonDatHangBean;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.*;
/**
 *
 * @author Phuong
 */
public class DonDatHangModel {
    
    PreparedStatement stm;
    ResultSet rs;
    public int getCurrentID() throws SQLException
    {
        String sql = "select MADDH from DONDATHANG";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int result = 1;
        while(rs.next())
        {
            if(rs.getInt("MADDH")!=result)
                return result;
            else
                result++;
        }
        return result;
    }
    
    public int getCurrentIDInvoice() throws SQLException
    {
        String sql = "select SOHD from HOADON";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int result = 1;
        while(rs.next())
        {
            if(rs.getInt("SOHD")!=result)
                return result;
            else
                result++;
        }
        return result;
    }
    
    public ResultSet getOrderList() throws SQLException
    {
        String sql = "select * from DONDATHANG join KHACHHANG on DONDATHANG.MAKH = KHACHHANG.MAKH";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    
    public ResultSet getOrder(int maddh) throws SQLException
    {
        String sql = "select * from DONDATHANG where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    
    public ResultSet getOrderDetails(int maddh) throws SQLException
    {
        String sql = "select * from CTDDH where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    
    public int addOrder(DonDatHangBean ddh) throws SQLException
    {
        String sql = "insert into DONDATHANG values("+this.getCurrentID()
                +","+ddh.getMAKH()
                +",GETDATE()"
                +","+ddh.getTriGia()
                + ","+ddh.getTinhTrang()+")";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int updateFood(String mamon, int sl) throws SQLException
    {
        String sql = "update MONAN set TINHTRANG = TINHTRANG - "+sl+" where MAMON = '"+mamon+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public void updateStock(int maddh) throws SQLException
    {
        String sql = "select * from CTDDH where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        while(rs.next())
            this.updateFood(rs.getString("MAMON"), rs.getInt("SL")); 
    }
    
    public int addInvoiceDetails(int sohd, String mamon, int sl) throws SQLException
    {
        String sql = "insert into CHITIETHOADON values("+sohd+",'"+mamon+"',"+sl+")";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int updateStatus(int maddh) throws SQLException
    {
        String sql = "update DONDATHANG set TRANGTHAI = 1 where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int createFinalInvoice(int maddh) throws SQLException
    {
        int curr_sohd = this.getCurrentIDInvoice();
        ResultSet rs1 = null;
        int result = 0;
        rs = this.getOrder(maddh);
        rs1 = this.getOrderDetails(maddh);
        String sql = null;
        String sql1 = null;
        if(rs.next())
        {
            if(rs.getInt("TRANGTHAI")==1)
                return 0;
            else
                sql = "insert into HOADON values("+curr_sohd+","+rs.getInt("MADDH")+",'Admin',GETDATE(),"+rs.getInt("TRIGIA")+")";
        }
        stm = Connect.GetConnect().prepareStatement(sql);
        result = stm.executeUpdate();
        while(rs1.next())
            this.addInvoiceDetails(curr_sohd, rs1.getString("MAMON"),rs1.getInt("SL")); 
        this.updateStock(maddh); 
        this.updateStatus(maddh);
        return result;
    }
    
    public int addOrderDetails(DonDatHangBean ddh, String mamon, int sl, int trangthai) throws SQLException
    {
        String sql = "insert into CTDDH values("+ddh.getMADDH()+",'"+mamon+"',"+sl+","+trangthai+")";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteOrderDetails(int maddh) throws SQLException
    {
        String sql = "delete from CTDDH where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteInvoice(int maddh) throws SQLException
    {
        String sql = "select SOHD from HOADON where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        if(rs.next())
            this.deleteInvoiceDetails(rs.getInt("SOHD"));
        sql = "delete from HOADON where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteInvoiceByID(int sohd) throws SQLException
    {
        this.deleteInvoiceDetails(sohd);
        String sql = "delete from HOADON where SOHD = "+sohd;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteOrderDelivery(int maddh) throws SQLException
    {
        String sql = "delete from DELIVERY where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteInvoiceDetails(int sohd) throws SQLException
    {
        String sql = "delete from CHITIETHOADON where SOHD = "+sohd;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int deleteOrder(int maddh) throws SQLException
    {
        this.deleteOrderDetails(maddh);
        this.deleteInvoice(maddh);
        this.deleteOrderDelivery(maddh);
        String sql = "delete from DONDATHANG where MADDH = "+maddh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public ResultSet getCustomersInvoices() throws SQLException
    {
        String sql = "select * from HOADON";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
}
