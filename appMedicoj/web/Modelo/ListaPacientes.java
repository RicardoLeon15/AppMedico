/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;
import Modelo.ConexionBD;
import java.sql.*;
import Modelo.Paciente;
import Modelo.Expediente;
import java.util.ArrayList;
/**
 *
 * @author Erick
 */
public class ListaPacientes {
    ArrayList<Paciente> lista = new ArrayList<Paciente>();  
    
    
    public ArrayList<Paciente> getPaciente()
    {
        return lista;
    }
    
    void buscarFecha(String Fecha)
    {
        lista.clear();
        try
        {
            ConexionBD conexion = new ConexionBD();
            conexion.conector();
            String sql;
            sql = "SELECT p.IdPaciente, p.Nombre, p.Paterno, p.Materno, p.Edad, p.Genero, p.'Fecha de Nacimiento', e.IdExpediente, e.Padecimiento, e.Sintomas, e.Ingreso, e.Medicacion, e.IdDoctor FROM Paciente AS p INNER JOIN Expediente AS e ON p.IdExpediente = e.IdExpediente WHERE e.Ingreso LIKE '"+Fecha+"'";
            conexion.Resultado = conexion.stmt.executeQuery(sql);
             while(conexion.Resultado.next())
        {
            Paciente enfermo = new Paciente();
            Expediente primero = new Expediente();
            
            primero.setIdExpediente(conexion.Resultado.getString("Expediente"));
            primero.ActualizarDatos(conexion.Resultado.getString("Padecimiento"), conexion.Resultado.getString("Sintomas"), conexion.Resultado.getString("Medicacion"), conexion.Resultado.getString("Ingresos"), conexion.Resultado.getString("IdDoctor"));
            
            enfermo.setIdPaciente(conexion.Resultado.getString("IdPaciente"));
            enfermo.ActualizarDatos(conexion.Resultado.getString("Nombre"), conexion.Resultado.getString("Paterno"), conexion.Resultado.getString("Materno"), conexion.Resultado.getString("Edad"), conexion.Resultado.getString("Genero"), conexion.Resultado.getString("Fecha de Nacimiento"), conexion.Resultado.getString("IdPaciente"));
            lista.add(enfermo);
        }
        
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
    }
    
        void buscarNombre(String Nom)
    {
        lista.clear();
        try
        {
            ConexionBD conexion = new ConexionBD();
            conexion.conector();
            String sql;
            sql = "SELECT p.IdPaciente, p.Nombre, p.Paterno, p.Materno, p.Edad, p.Genero, p.'Fecha de Nacimiento', e.IdExpediente, e.Padecimiento, e.Sintomas, e.Ingreso, e.Medicacion, e.IdDoctor FROM Paciente AS p INNER JOIN Expediente AS e ON p.IdExpediente = e.IdExpediente WHERE e.Ingreso LIKE '"+Nom+"'";
            conexion.Resultado = conexion.stmt.executeQuery(sql);
             while(conexion.Resultado.next())
        {
            Paciente enfermo = new Paciente();
            Expediente primero = new Expediente();
            
            primero.setIdExpediente(conexion.Resultado.getString("Expediente"));
            primero.ActualizarDatos(conexion.Resultado.getString("Padecimiento"), conexion.Resultado.getString("Sintomas"), conexion.Resultado.getString("Medicacion"), conexion.Resultado.getString("Ingresos"), conexion.Resultado.getString("IdDoctor"));
            
            enfermo.setIdPaciente(conexion.Resultado.getString("IdPaciente"));
            enfermo.ActualizarDatos(conexion.Resultado.getString("Nombre"), conexion.Resultado.getString("Paterno"), conexion.Resultado.getString("Materno"), conexion.Resultado.getString("Edad"), conexion.Resultado.getString("Genero"), conexion.Resultado.getString("Fecha de Nacimiento"), conexion.Resultado.getString("IdPaciente"));
            lista.add(enfermo);
        }
        
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
    }
        
        
        void allPacientes()
    {
        lista.clear();
        try{
        ConexionBD conexion = new ConexionBD();
        
        conexion.conector();
        
        String sql = "SELECT * from paciente";
        
        conexion.Resultado = conexion.stmt.executeQuery(sql);
       
        while(conexion.Resultado.next())
        {
         Paciente enfermo = new Paciente();
         enfermo.ActualizarDatos(conexion.Resultado.getString("Nombre"), conexion.Resultado.getString("Paterno"), conexion.Resultado.getString("Materno"), conexion.Resultado.getString("Edad"), conexion.Resultado.getString("Genero"), conexion.Resultado.getString("Fecha de Nacimiento"), conexion.Resultado.getString("IdPaciente"));
         lista.add(enfermo);
        }
        }catch(SQLException e)
        {
            System.out.println("Error " + e);
        }
        
        
    
    }
}
