/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Modelo;

import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author Erick
 */
abstract class Sujeto {
    protected List<Observer> observadores = 
        new ArrayList<Observer>(); 
    
        public void agrega(Observer observador) 
    { 
        observadores.add(observador); 
    } 
 
    public void suprime(Observer observador) 
    { 
        observadores.remove(observador); 
    } 
}
