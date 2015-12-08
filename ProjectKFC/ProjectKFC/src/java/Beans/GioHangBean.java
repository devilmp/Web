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
public class GioHangBean implements java.io.Serializable {
    private String TenMonAn = null;
    private int Gia = 0;
    private String MaMonan = null;
    private int SL = 0;
    public GioHangBean()
    {
        
    }
    public void setMaMonan(String mamon)
    {
        MaMonan = mamon;
    }
    public void setTenMonan(String tenmon)
    {
        TenMonAn = tenmon;
    }
    public void setGia(int gia)
    {
        Gia = gia;
    }
    public void setSL(int sl)
    {
        SL = sl;
        if(SL < 0)
            SL = 0;
    }
    public String getMamon()
    {
        return MaMonan;
    }
    public int getSL()
    {
        return SL;
    }
    public String getTenmon()
    {
        return TenMonAn;
    }
    public int getGia()
    {
        return Gia;
    }
}
