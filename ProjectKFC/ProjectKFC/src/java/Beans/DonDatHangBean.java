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
public class DonDatHangBean {
    private int MADDH = 0;
    private int MAKH = 0;
    private int TRIGIA = 0;
    private int TRANGTHAI = 0;
    
    public void setMADDH(int maddh)
    {
        MADDH = maddh;
    }
    public void setMAKH(int makh)
    {
        MAKH = makh;
    }
    public void setTriGia(int trigia)
    {
        TRIGIA = trigia;
    }
    public void setTrangThai(int trangthai)
    {
        TRANGTHAI = trangthai;
    }
    
    public int getMADDH()
    {
        return MADDH;
    }
    public int getMAKH()
    {
        return MAKH;
    }
    public int getTriGia()
    {
        return TRIGIA;
    }
    public int getTinhTrang()
    {
        return TRANGTHAI;
    }
}
