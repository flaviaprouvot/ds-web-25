package com.example.atividade3

import android.os.Bundle
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.clickable
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.CircleShape
import androidx.compose.material3.Text
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.atividade3.ui.theme.Atividade3Theme
import androidx.compose.material3.Card as M3Card

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            Atividade3Theme {
                PainelPontuacao()
            }
        }
    }
}

@Composable
fun PainelPontuacao() {
    var pontosA by remember { mutableStateOf(0) }
    var pontosB by remember { mutableStateOf(0) }

    Column(
        modifier = Modifier
            .fillMaxSize()
            .padding(32.dp),
        horizontalAlignment = Alignment.CenterHorizontally,
        verticalArrangement = Arrangement.Center
    ) {
        // Time A
        Text("Time A", fontSize = 20.sp, fontWeight = FontWeight.Medium)
        Text("$pontosA", fontSize = 28.sp, fontWeight = FontWeight.Bold)

        M3Card(
            shape = CircleShape,
            modifier = Modifier
                .padding(top = 8.dp)
                .size(70.dp)
                .clickable { pontosA++ }
        ) {
            Box(contentAlignment = Alignment.Center, modifier = Modifier.fillMaxSize()) {
                Text("Add")
            }
        }

        Spacer(modifier = Modifier.height(40.dp))

        // Time B
        Text("Time B", fontSize = 20.sp, fontWeight = FontWeight.Medium)
        Text("$pontosB", fontSize = 28.sp, fontWeight = FontWeight.Bold)

        M3Card(
            shape = CircleShape,
            modifier = Modifier
                .padding(top = 8.dp)
                .size(70.dp)
                .clickable { pontosB++ }
        ) {
            Box(contentAlignment = Alignment.Center, modifier = Modifier.fillMaxSize()) {
                Text("Add")
            }
        }
    }
}

@Preview(showBackground = true)
@Composable
fun PainelPontuacaoPreview() {
    PainelPontuacao()
}
