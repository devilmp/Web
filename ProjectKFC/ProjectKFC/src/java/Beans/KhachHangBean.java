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
public class KhachHangBean {
    private int MAKH = 0;
    private String NGAYSINH = null;
    private String TENKH = null;
    private int GIOITINH = 1;
    private String DIACHI = null;
    private String TINH = null;
    private String THANHPHO = null;
    private String SDT = null;
    private int DOANHSO = 0;
    private String EMAIL = null;
    private String TAIKHOAN = null;
    private String MATKHAU = null;
    
    public void setMAKH(int makh)
    {
        MAKH = makh;
    }
    public void setTENKH(String tenkh)
    {
        TENKH = tenkh;
    }
    public void setGIOITINH(int gioitinh)
    {
        GIOITINH = gioitinh;
    }
    public void setDIACHI(String diachi)
    {
        DIACHI = diachi;
    }
    public void setTINH(String tinh)
    {
        TINH = tinh;
    }
    public void setTP(String tp)
    {
        THANHPHO = tp;
    }
    public void setSDT(String sdt)
    {
        SDT = sdt;
    }
    public void setDOANHSO(int doanhso)
    {
        DOANHSO = doanhso;
    }
    public void setEMAIL(String email)
    {
        EMAIL = email;
    }
    public void setNGAYSINH(int ngay, int thang, int nam)
    {
        NGAYSINH = thang + "-" + ngay + "-" + nam;
    }
    public void setTAIKHOAN(String tk)
    {
        TAIKHOAN = tk;
    }
    public void setMATKHAU(String matkhau)
    {
        MATKHAU = matkhau;
    }
    
    public int getMAKH()
    {
        return MAKH;
    }
    public String getTENKH()
    {
        return TENKH;
    }
    public int getGIOITINH()
    {
        return GIOITINH;
    }
    public String getNGAYSINH()
    {
        return NGAYSINH;
    }
    public String getDIACHI()
    {
        return DIACHI;
    }
    public String getTINH()
    {
        return TINH;
    }
    public String getTP()
    {
        return THANHPHO;
    }
    public String getSDT()
    {
        return SDT;
    }
    public int getDOANHSO()
    {
        return DOANHSO;
    }
    public String getEMAIL()
    {
        return EMAIL;
    }
    public String getTAIKHOAN()
    {
        return TAIKHOAN;
    }
    public String getMATKHAU()
    {
        return MATKHAU;
    }
}
