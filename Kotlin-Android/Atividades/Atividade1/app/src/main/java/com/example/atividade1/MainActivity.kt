package com.example.atividade1

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade1.ui.theme.Atividade1Theme

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Atividade1Theme {
                Tela()
            }
        }
    }
}

@Composable
fun Tela() {
    Surface(
        modifier = Modifier
            .fillMaxSize()
            .background(Color(0xFFFFFFFF)),
        color = Color(0xFF5998EE)
    ) {
        Column(
            modifier = Modifier
                .fillMaxSize()
                .padding(16.dp),
            verticalArrangement = Arrangement.Center,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {
            Card(
                nome = "Bruno",
                telefone = "(15) 99857-1951",
                email = "bruno@attina.com"
            )

            Spacer(modifier = Modifier.height(16.dp))

            Card(
                nome = "Scudeler",
                telefone = "(15) 99657-7458",
                email = "antonio@scudeler.com"
            )
        }
    }
}

@Composable
fun Card(
    nome: String,
    telefone: String,
    email: String
) {
    Box(
        modifier = Modifier
            .padding(8.dp)
            .fillMaxWidth()
            .background(color = Color(0xFFFFFFFF))
    ) {
        Column(
            modifier = Modifier
                .fillMaxWidth()
                .padding(16.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            verticalArrangement = Arrangement.Center
        ) {
            Text(text = "Nome: $nome", fontSize = 16.sp)
            Text(text = "Tel: $telefone", fontSize = 16.sp)
            Text(text = "Email: $email", fontSize = 16.sp)
        }
    }
}

@Preview(showBackground = true)
@Composable
fun TelaPreview() {
    Atividade1Theme {
        Tela()
    }
}
