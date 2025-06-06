import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { jwtDecode } from 'jwt-decode';
import { CookieService } from 'ngx-cookie-service';
import { Observable } from 'rxjs';
import { User } from '../shared/models/user';

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

  getDecodedAccessToken(token: string): any {
    try {
      return jwtDecode(token); // Jwt token decoding
    } catch (Error) {
      return null;
    }
  }

  getUser(): Observable<any> {
    let user: User = {} as User; // Created a user object
    let tokenInfo = this.getDecodedAccessToken(this.getToken()); // Get the decoded token information
    user.email = tokenInfo.username; // The mail attribute of the user object is equal to the mail attribute (username) contained in the token
    return this.http.get(
      `http://localhost:8000/api/user/${tokenInfo.username}` // Send the user to PHP
    );
  }
}
