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
public class TaiKhoanBean {
    
    private String TAIKHOAN = null;
    private String MATKHAU = null;
    public void setTAIKHOAN(String tk)
    {
        TAIKHOAN = tk;
    }
    public void setMATKHAU(String matkhau)
    {
        MATKHAU = matkhau;
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
