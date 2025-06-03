package com.example.navigation

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.navigation.compose.NavHost
import androidx.navigation.compose.composable
import androidx.navigation.compose.rememberNavController
import com.example.navigation.ui.theme.NavigationTheme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            NavigationTheme {

                var navController = rememberNavController()

                NavHost(navController = navController , startDestination = "login") {
                    composable(route = "login"){
                        LoginScreen(navController)
                    }
                    composable(route = "home"){
                        HomeScreen(navController)
                    }
                }

                }
            }
        }
    }
