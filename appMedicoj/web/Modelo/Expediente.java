/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;

import Modelo.ConexionBD;
import java.sql.*;
import Modelo.Sujeto;

/**
 *
 * @author Erick
 */
public class Expediente {
    private String IdExpediente;
    private String Padecimiento;
    private String Sintomas;
    private String Ingreso;
    private String Medicacion;
    private String IdDoctor;
    
    
    Expediente(){
        
    }
    
    public String getIdExpediente()
    {
        return IdExpediente;
    }
    
        public String getPadecimiento()
    {
        return Padecimiento;
    }
    
    public String getSintomas()
    {
        return Sintomas;
    }
    
    public String getINgreso()
    {
        return Ingreso;
    }
    
    public String getMedicacion()
    {
        return Medicacion;
    }
    
        public String IdDoctor()
    {
        return IdDoctor;
    }
    
    void setIdExpediente(String ID)
    {
        IdExpediente = ID;
    }
    
    void ActualizarDatos(String Pad,String Sint, String Medi, String Ing, String IdDoc)
    {
        Padecimiento = Pad;
        Sintomas = Sint;
        Medicacion = Medi;
        Ingreso = Ing;
        IdDoctor = IdDoc;
    }
    
    boolean ingresarExpediente()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        
        String sql = "INSERT INTO expediente (`Padecimiento`, `Sintomas`, `Ingreso`, `Medicacion`, `IdDoctor`) VALUES ('"+Padecimiento+"','"+Sintomas+"','"+Ingreso+"','"+Medicacion+"','"+IdDoctor+"')";
        
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        return true;
     
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
        return false;
    }
    boolean buscarExpediente(String Id)
    {
        try{
            
        
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "Select * from Expediente where IdExpediente = '%" +Id+"%'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
        IdExpediente = conexion.Resultado.getString("IdExpediente");
        Padecimiento = conexion.Resultado.getString("Padecimiento");
        Sintomas = conexion.Resultado.getString("Sintomas");
        Medicacion = conexion.Resultado.getString("Medicacion");
        Ingreso = conexion.Resultado.getString("Ingreso");
        IdDoctor = conexion.Resultado.getString("IdDoctor");
         
        }
       return true;
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
    
    
     boolean ActualizarExpediente()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "UPDATE Expediente SET Padecimiento = '"+Padecimiento+"', Sintomas = '"+Sintomas+"', Ingreso = '"+Ingreso+"', Medicacion = '"+Medicacion+"', IdDoctor = '"+IdDoctor+"' WHERE IdExpediente = '"+IdExpediente+"'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
               
         return true;
        
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
     
          boolean EliminarExpediente()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "DELETE FROM Expediente WHERE IdExpediente = '"+IdExpediente+"'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        
        
         return true;
        
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
}
