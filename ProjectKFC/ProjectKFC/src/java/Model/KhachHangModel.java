/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Model;
import Beans.KhachHangBean;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.*;
/**
 *
 * @author Phuong
 */
public class KhachHangModel {
    
    PreparedStatement stm;
    ResultSet rs;
    public int getCurrentVirtualID() throws SQLException
    {
        String sql = "select MAKH from KHACHHANG where MAKH < 0 order by MAKH DESC";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int result = -1;
        while(rs.next())
        {
            if(rs.getInt("MAKH")!=result)
                return result;
            else
                result--;
        }
        return result;
    }
    public int getCurrentID() throws SQLException
    {
        String sql = "select MAKH from KHACHHANG where MAKH > 0 order by MAKH ASC";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        int result = 1;
        while(rs.next())
        {
            if(rs.getInt("MAKH")!=result)
                return result;
            else
                result++;
        }
        return result;
    }
    public int addVirtualCustomer() throws SQLException
    {
        int virtual_id = this.getCurrentVirtualID();
        String sql = "insert into KHACHHANG values("+virtual_id
                +",'abc',"
                + "'12-1-1994',"
                + "1,"
                + "'abc',"
                + "'xyz',"
                + "'bla',"
                + "'123',"
                + "0,"
                + "'virtual@gmail.com',"
                + "'virtual',"
                + "'virtual')";
        stm = Connect.GetConnect().prepareStatement(sql);
        stm.executeUpdate();
        return virtual_id;
    }
    
    public int addCustomer(KhachHangBean khb) throws SQLException
    {
        int id = this.getCurrentID();
        String sql = "insert into KHACHHANG values("+id
                +",N'"+khb.getTENKH()+"',"
                + "'"+khb.getNGAYSINH()+"',"
                + khb.getGIOITINH()+","
                + "N'"+khb.getDIACHI()+"',"
                + "N'"+khb.getTINH()+"',"
                + "N'"+khb.getTP()+"',"
                + "'"+khb.getSDT()+"',"
                + "0,"
                + "'"+khb.getEMAIL()+"',"
                + "'"+khb.getTAIKHOAN()+"',"
                + "'"+khb.getMATKHAU()+"')";
        stm = Connect.GetConnect().prepareStatement(sql);
        stm.executeUpdate();
        return id;
    }
    
    public int updateDoanhSo(int makh, int doanhso) throws SQLException
    {
        String sql = "update KHACHHANG set DOANHSO = DOANHSO + "+doanhso+" where MAKH = "+makh;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int updateCustomer(int makh, int maddh, String hoten, String diachi, String khuvuc, String sdt, String email,int doanhso) throws SQLException
    {
        String sql = "insert into DELIVERY values("+maddh+","
                + "N'"+hoten+"',"
                + "N'"+diachi+"',"
                + "N'"+khuvuc+"',"
                + "N'"+khuvuc+"',"
                + "'"+sdt+"',"
                + "'"+email+"')";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
    
    public int checkAccount(String taikhoan, String matkhau) throws SQLException
    {
        String sql = "select * from KHACHHANG where TAIKHOAN = N'"+taikhoan+"' and MATKHAU = N'"+matkhau+"'";
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        return (rs.next())?rs.getInt("MAKH"):0;
    }
}
