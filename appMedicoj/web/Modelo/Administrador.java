/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;
import Modelo.ConexionBD;
import java.sql.*;
/**
 *
 * @author Erick
 */
public class Administrador {
    private int idAdministrador;
    private String Nombre;
    private String Paterno;
    private String Materno;
    private String Contrasenia;
    
    
    Administrador(){
        
    }
    
    /**
     *
     * @return
     */
    public int getIdAdministrador(){
        return idAdministrador;
    }
    
    public String getNombre()
    {
        return Nombre;
    }
    
    public String getPaterno()
    {
        return Paterno;
    }
    
    public String getMaterno()
    {
        return Materno;
    }
    
    public String getContrasenia()
    {
        return Contrasenia;
    }
    
    public void ActualizaDatos(int ID, String _Nombre, String aPaterno, String aMaterno, String _Contrasenia)
    {
        idAdministrador = ID;
        Nombre = _Nombre;
        Paterno = aPaterno;
        Materno = aMaterno;
        Contrasenia = _Contrasenia;
    }
    
    public boolean IniciaSesion(String ID, String password)
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        
        String sql = "SELECT IdAdministrador,Contrasenia FROM Administrador WHERE IdAdministrador= '"+ID+"' AND Contrasenia='"+password+"'";
        
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        return true;
     
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
        return false;
        
    }
    
}
