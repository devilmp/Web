/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Model;
import Beans.TinTucBean;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.*;

/**
 *
 * @author Phuong
 */
public class TinTucModel {
    
    PreparedStatement stm;
    ResultSet rs;
    public int getCurr_Id() throws SQLException
    {
        int result = 1;
        String sql = "select MATINTUC from TINTUC";
        stm = Connect.GetConnect().prepareStatement(sql); 
        rs = stm.executeQuery();
        while(rs.next())
        {
            if(result != rs.getInt("MATINTUC"))
                return result + 1;
            else
                result++;
        }
        return result;
    }
    public String getImagePath(String loaitintuc)
    {
        return (loaitintuc.equals("News"))?"images/News/":"images/Promote/";
    }
    public int getLoaiTinTuc(String loaiTintuc){
        return (loaiTintuc.equals("News"))?1:2;
    }
    public int addNewsPromotion(TinTucBean tintuc) throws SQLException
    {
        int matintuc = 0;
        matintuc = this.getCurr_Id();
        int maloaitintuc = 0;
        maloaitintuc = this.getLoaiTinTuc(tintuc.getLoaiTinTuc());
        String hinhanh = null;
        hinhanh = this.getImagePath(tintuc.getLoaiTinTuc()) + tintuc.getHinhAnh();
        String sql = "insert into TINTUC values("+matintuc
                +","+maloaitintuc
                +",N'"+tintuc.getTieuDe()+"'"
                +",N'"+tintuc.getMoTaNgan()+"'"
                +",N'"+tintuc.getNoiDung()+"'"
                +",'"+hinhanh+"')";
        stm = Connect.GetConnect().prepareStatement(sql); 
        return stm.executeUpdate();
    }
    public ResultSet getNews() throws SQLException
    {
        String sql = "select * from TINTUC where MALOAITINTUC = 1";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    
    public ResultSet getPromotion() throws SQLException
    {
        String sql = "select * from TINTUC where MALOAITINTUC = 2";
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeQuery();
    }
    public TinTucBean getNewsPromotionByID(int id) throws SQLException
    {
        String sql = "select * from TINTUC where MATINTUC = "+id;
        stm = Connect.GetConnect().prepareStatement(sql);
        rs = stm.executeQuery();
        TinTucBean tintuc = new TinTucBean();
        while(rs.next())
        {
            tintuc.setTieuDe(rs.getString("TIEUDE"));
            tintuc.setLoaiTinTuc(rs.getString("MALOAITINTUC"));
            tintuc.setNoiDung(rs.getString("NOIDUNG"));
            tintuc.setMoTaNgan(rs.getString("MOTANGAN"));
            tintuc.setHinhAnh(rs.getString("HINHANH"));
        }
        return tintuc;
    }
    public int deleteNewsPromotion(int matintuc) throws SQLException
    {
        String sql = "delete from TINTUC where MATINTUC = "+matintuc;
        stm = Connect.GetConnect().prepareStatement(sql);
        return stm.executeUpdate();
    }
}
