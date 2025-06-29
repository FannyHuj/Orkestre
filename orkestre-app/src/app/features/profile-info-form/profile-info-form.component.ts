import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { UserService } from '../../services/user.service';
import { User } from '../../shared/models/user';
import { AuthenticationService } from '../../services/authentication.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-profile-info-form',
  imports: [CommonModule, FormsModule],
  templateUrl: './profile-info-form.component.html',
  styleUrl: './profile-info-form.component.css'
})
export class ProfileInfoFormComponent {
  user: User = {} as User;
  userConnected = {} as User;

  firstName: string = '';
  lastName: string = '';
  email: string = '';
  phoneNumber: string = '';


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
       
        this.firstName = this.user.firstName;
        this.lastName = this.user.lastName;
        this.email = this.user.email;
        this.phoneNumber = this.user.phoneNumber;
      });
   
      
    
  }

    

}
