import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { User } from '../../shared/models/user';
import { AuthenticationService } from '../../services/authentication.service';
import { UserService } from '../../services/user.service';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-profile-page',
  imports: [RouterLink, FormsModule],
  templateUrl: './profile-page.component.html',
  styleUrl: './profile-page.component.css',
})
export class ProfilePageComponent {
  user: User = {} as User;
  userConnected = {} as User;
  pictureURL = 'http://localhost:8000/';

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
}

updateProfileInfos(){
  const formData = new FormData();

  formData.append("firstName", this.userConnected.firstName);
  formData.append("lastName", this.userConnected.lastName);
  formData.append("email", this.userConnected.email);
  formData.append("phoneNumber", this.userConnected.phoneNumber);
  formData.append("picture", this.userConnected.picture);

  this.userService.updateProfileInfos(this.userConnected.id,formData).subscribe({
    next: (response) => {
      console.log('User updated successfully', response);
    },
    error: (error) => {
      console.error('Error updating user', error);
    },
  });
}

}