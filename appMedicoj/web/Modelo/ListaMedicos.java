/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;
import Modelo.ConexionBD;
import java.sql.*;
import Modelo.Medico;
import java.util.ArrayList;
/**
 *
 * @author Erick
 */
public class ListaMedicos {
    ArrayList<Medico> lista = new ArrayList<Medico>();  
    
    
    public ArrayList<Medico> getMedico()
    {
        return lista;
    }
    
    void allMedicos()
    {
        lista.clear();
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        
        String sql = "SELECT * from Doctor";
        
        conexion.Resultado = conexion.stmt.executeQuery(sql);
       
        while(conexion.Resultado.next())
        {
         Medico doctor = new Medico();
         doctor.ActualizaDatos(conexion.Resultado.getInt("IdDoctor"), conexion.Resultado.getString("Nombre"), conexion.Resultado.getString("Paterno"), conexion.Resultado.getString("Materno"), conexion.Resultado.getString("Contrasenia"));
         lista.add(doctor);
        }
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
        
        
    
    }
    
        void buscarNombre(String Nom)
    {
        try{
            
        
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        String sql = "Select * from Doctor where Nombre = '%" +Nom+"%'";
        conexion.Resultado = conexion.stmt.executeQuery(sql);
        if(conexion.Resultado.next())
        {
            Medico doctor = new Medico();
            doctor.ActualizaDatos(conexion.Resultado.getInt("IdDoctor"), conexion.Resultado.getString("Nombre"), conexion.Resultado.getString("Paterno"), conexion.Resultado.getString("Materno"), conexion.Resultado.getString("Contrasenia"));
   
     
        }
       
        }catch(SQLException e)
        {
             System.out.println("Error " + e);
        }
      
    
    }
}
