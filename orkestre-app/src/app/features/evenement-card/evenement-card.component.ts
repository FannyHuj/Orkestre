import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Evenement } from '../../shared/models/evenement';
import { EvenementService } from '../../services/evenement.service';
import { AuthenticationService } from '../../services/authentication.service';
import { UserService } from '../../services/user.service';

@Component({
  selector: 'app-evenement-card',
  imports: [CommonModule, FormsModule],
  templateUrl: './evenement-card.component.html',
  styleUrl: './evenement-card.component.css'
})
export class EvenementCardComponent {

  evenement: Evenement = {} as Evenement;
  evenementList: Evenement[] = [];
 

  constructor(private service: EvenementService,private authenticationService: AuthenticationService, private UserService:UserService) {
    this.authenticationService.getUser().subscribe((user: any) => {
      // Store the user object
      const currentUser = user;
      this.evenementList = []; // Initialize evenementList
      this.service.findEvenementByUserId(currentUser.id).subscribe((data: Evenement[]) => {
        this.evenementList = data; // Fetch events for the current user
      });
      
    });
  }

}
