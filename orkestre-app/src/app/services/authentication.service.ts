import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { CookieService } from 'ngx-cookie-service';

@Injectable({
  providedIn: 'root',
})
export class AuthenticationService {
  token: string | null = null;

  constructor(private cookieService: CookieService, private http: HttpClient) {}

  setToken(token: string) {
    this.cookieService.set('jwtToken', token);
  }

  getToken(): string {
    return this.cookieService.get('jwtToken');
  }
}
