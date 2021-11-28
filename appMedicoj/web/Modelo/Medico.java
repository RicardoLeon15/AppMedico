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
public class Medico {
    private int idMedico;
    private String Nombre;
    private String Paterno;
    private String Materno;
    private String Contrasenia;
    
    Medico()
    {
        
    }
    
     public int getIdMedico(){
        return idMedico;
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
        idMedico = ID;
        Nombre = _Nombre;
        Paterno = aPaterno;
        Materno = aMaterno;
        Contrasenia = _Contrasenia;
    }
    
    void buscarMedico(String ID)
    {
               try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "Select * from Doctor where IdDoctor = '%" +ID+"%'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
            idMedico = conexion.Resultado.getInt("IdDoctor");
            Nombre = conexion.Resultado.getString("Nombre");
            Paterno = conexion.Resultado.getString("Paterno");
            Materno = conexion.Resultado.getString("Materno");
            Contrasenia = conexion.Resultado.getString("Contrasenia");
        }
       
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        
        
    }
    
    boolean agregarMedico()
    {
         try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "INSERT INTO doctor (`Nombre`, `Paterno`, `Materno`, `Contrasenia`) VALUES ('"+Nombre+"','"+Paterno+"','"+Materno+"','"+Contrasenia+"')";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
            return true;
        }
       
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
         return false;
    }
    
              boolean EliminarMedico()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "DELETE FROM Expediente WHERE IdExpediente = '"+idMedico+"'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
         return true;
        }
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
              
        public boolean IniciaSesion(String ID, String password)
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        
        String sql = "SELECT IdDoctor,Contrasenia FROM Doctor WHERE IdDoctor= '"+ID+"' AND Contrasenia='"+password+"'";
        
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        return true;
     
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
        
        return false;
    }
}
