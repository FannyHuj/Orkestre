import { Component } from '@angular/core';
import { AuthenticationService } from '../../services/authentication.service';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { Login } from '../../shared/models/login';
import { Router, RouterLink } from '@angular/router';

@Component({
  selector: 'app-login',
  imports: [FormsModule, CommonModule, RouterLink],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css',
})
export class LoginComponent {
  constructor(private auth: AuthenticationService,private router: Router) {}
  login: Login = {} as Login;
  token: string | null = null;

  log() {
    this.auth.login(this.login).subscribe({
      next: auth => {
        this.auth.setToken(auth.token);
        this.router.navigateByUrl("/");
      },
      error: err => console.error('Quelque chose s\'est mal passé :', err)
    });
  }
}
