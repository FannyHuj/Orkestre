import { Component } from '@angular/core';
import { ProfileHeaderComponent } from "../../features/profile-header/profile-header.component";
import { ProfileInfoFormComponent } from "../../features/profile-info-form/profile-info-form.component";

@Component({
  selector: 'app-profile-page',
  imports: [ProfileHeaderComponent, ProfileInfoFormComponent],
  templateUrl: './profile-page.component.html',
  styleUrl: './profile-page.component.css'
})
export class ProfilePageComponent {

}
