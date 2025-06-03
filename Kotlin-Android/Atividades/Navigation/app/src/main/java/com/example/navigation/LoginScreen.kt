package com.example.navigation

import androidx.compose.foundation.layout.Column
import androidx.compose.material3.Button
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.navigation.NavController

@Composable
fun LoginScreen(navController: NavController){
    Column{
        Text (text = "tela de login")

        Button(onClick = {navController.navigate("home")} ) {
            Text("Acessar a home")
        }
    }
}