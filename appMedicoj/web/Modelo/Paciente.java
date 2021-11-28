/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;
import java.sql.*;
import Modelo.Expediente;
import java.util.ArrayList;
/**
 *
 * @author Erick
 */
public class Paciente {
    protected String IdPaciente;
    protected String Nombre;
    protected String Paterno;
    protected String Materno;
    protected String Edad;
    protected String Genero;
    protected String Expediente;
    protected String FechaNacimiento;
    protected Expediente expediente;
    
    Paciente()
    {
        Expediente expediente = new Expediente();
    }

         public String getIdPaciente()
    {
        return IdPaciente;
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
    
    public String getEdad()
    {
        return Edad;
    }
    
    public String getGenero()
    {
        return Genero;
    }
    
    public String getFechaNacimiento()
    {
        return FechaNacimiento;
    }
    
    public String getExpediente()
    {
        return Expediente;
    }
    
    void setIdPaciente(String ID)
    {
        IdPaciente = ID;
    }
    
        boolean buscarPaciente(String ID)
    {
               try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "Select * from Paciente where IdPaciente = '%" +ID+"%'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
            IdPaciente = conexion.Resultado.getString("IdPaciente");
            Nombre = conexion.Resultado.getString("Nombre");
            Paterno = conexion.Resultado.getString("Paterno");
            Materno = conexion.Resultado.getString("Materno");
            Edad = conexion.Resultado.getString("Edad");
            Genero = conexion.Resultado.getString("Genero");
            FechaNacimiento = conexion.Resultado.getString("FNacimiento");
            return true;
        }
       
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        
        return false;
    }
        
         boolean ActualizarPaciente()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "UPDATE paciente SET Nombre ='"+Nombre+"',Paterno ='"+Paterno+"',Materno='"+Materno+"',Edad='"+Edad+"',Genero='"+Genero+"',FNacimiento ='"+FechaNacimiento+"',IdExpediente='"+Expediente+"' WHERE IdPaciente = '"+IdPaciente+"'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);

         return true;
        
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
         
        boolean EliminarPaciente()
    {
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "DELETE FROM paciente WHERE IdPaciente = '"+IdPaciente+"'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
       
         return true;
        
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
        return false;
    }
        
        
        void ActualizarDatos(String Nom, String Pat, String Mat, String Ed, String Gen, String FeNa, String Exp)
        {
            Nombre = Nom;
            Paterno = Pat;
            Materno = Mat;
            Edad = Ed;
            Genero = Gen;
            FechaNacimiento = FeNa;
            Expediente = Exp;
        }
        
        boolean agregarPaciente()
    {
         try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "INSERT INTO paciente(`Nombre`, `Paterno`, `Materno`, `Edad`, `Genero`, `FNacimiento`, `IdExpediente`) VALUES ('"+Nombre+"','"+Paterno+"','"+Materno+"','"+Edad+"','"+Genero+"','"+FechaNacimiento+"','"+Expediente+"')";
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
}
