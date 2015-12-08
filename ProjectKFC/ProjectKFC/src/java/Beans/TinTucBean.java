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
public class TinTucBean implements java.io.Serializable {
    private String TieuDe = null;
    private String MoTaNgan = null;
    private String NoiDung = null;
    private String LoaiTinTuc = null;
    private String HinhAnh = null;
    
    public TinTucBean()
    {
        
    }
    
    public String getTieuDe()
    {
        return TieuDe;
    }
    
    public String getMoTaNgan()
    {
        return MoTaNgan;
    }
    
    public String getNoiDung()
    {
        return NoiDung;
    }
    
    public String getLoaiTinTuc()
    {
        return LoaiTinTuc;
    }
    
    public String getHinhAnh()
    {
        return HinhAnh;
    }
   
    public void setTieuDe(String td)
    {
        TieuDe = td;
    }
    
    public void setMoTaNgan(String mtn)
    {
        MoTaNgan = mtn;
    }
    
    public void setNoiDung(String nd)
    {
        NoiDung = nd;
    }
    
    public void setLoaiTinTuc(String ltt)
    {
        LoaiTinTuc = ltt;
    }
    
    public void setHinhAnh(String ha)
    {
        HinhAnh = ha;
    }
}
