/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package Beans;

/**
 *
 * @author Phuong
 */
public class MonAnBean implements java.io.Serializable {
    private String MaMonAn = null;
    private String MaNhomMon = null;
    private String TenMonAn = null;
    private double Gia = 0;
    private int TrangThai = 0;
    private String HinhAnh = null;
    
    public MonAnBean()
    {
        
    }
    
    public String getMaMon()
    {
        return MaMonAn;
    }
    
    public String getMaNhom()
    {
        return MaNhomMon;
    }
    
    public String getTenMon()
    {
        return TenMonAn;
    }
    
    public double getGia()
    {
        return Gia;
    }
    
    public int getTrangThai()
    {
        return TrangThai;
    }
    
    public String getHinhAnh()
    {
        return HinhAnh;
    }
    
    public void setMaMon(String mamonan)
    {
        MaMonAn = mamonan;
    }
    
    public void setMaNhomMon(String manhomon)
    {
        MaNhomMon = manhomon;
    }
    
    public void setTenMon(String tenmonan)
    {
        TenMonAn = tenmonan;
    }
    
    public void setGia(double gia)
    {
        Gia = gia;
    }
    
    public void setTrangThai(int trangthai)
    {
        TrangThai = trangthai;
    }
    
    public void setHinhAnh(String hinhanh)
    {
        HinhAnh = hinhanh;
    }
}
