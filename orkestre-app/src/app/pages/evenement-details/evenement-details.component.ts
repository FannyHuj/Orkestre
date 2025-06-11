import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { EvenementRegistrationComponent } from '../evenement-registration/evenement-registration.component';

@Component({
  selector: 'app-evenement-details',
  imports: [RouterLink,EvenementRegistrationComponent],
  templateUrl: './evenement-details.component.html',
  styleUrl: './evenement-details.component.css'
})
export class EvenementDetailsComponent {

}
