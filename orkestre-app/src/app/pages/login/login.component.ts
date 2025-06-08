import { Component } from '@angular/core';
import { AuthenticationService } from '../../services/authentication.service';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { Login } from '../../shared/models/login';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-login',
  imports: [FormsModule, CommonModule, RouterLink],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class LoginComponent {
  constructor(private auth: AuthenticationService) {}
  login: Login = {} as Login;
  token: string | null = null;
  successMessage: string | null = null;

  log() {
    this.auth.login(this.login).subscribe({
      next: auth => {
        this.auth.setToken(auth.token);
        this.successMessage = 'Connexion réussie !'; // Affichage du message de connexion réussie
      },
      error: err => console.error('Quelque chose s\'est mal passé :', err)
    });
  }

  closeAlert() {
    this.successMessage = null;
  }
}
