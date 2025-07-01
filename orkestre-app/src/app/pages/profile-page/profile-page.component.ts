import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { User } from '../../shared/models/user';
import { AuthenticationService } from '../../services/authentication.service';
import { UserService } from '../../services/user.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-profile-page',
  imports: [RouterLink,FormsModule],
  templateUrl: './profile-page.component.html',
  styleUrl: './profile-page.component.css'
})
export class ProfilePageComponent {

  user: User = {} as User;
  userConnected = {} as User;
  pictureURL= 'http://localhost:8000/';

  
  constructor(
    private userService: UserService,
    private authenticationService: AuthenticationService
  ) {


        this.authenticationService.getUser().subscribe({
       next: (user) => {
         this.userConnected = user;
       },
       error: (err) => {
         console.error('Erreur:', err);
       },
       
     });

       this.userService.getProfileInfo(this.userConnected.id).subscribe(() => {
      
      });
   
    
  }

}
