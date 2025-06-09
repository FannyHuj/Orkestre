import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Evenement } from '../shared/models/evenement';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class EvenementService {

  constructor(private http:HttpClient) {}

  addEvenement(evenement:Evenement):Observable<Evenement>{
    return this.http.post<Evenement>('http://localhost:8000/api/createEvenement',evenement);
  }

  getAllEvenements():Observable<Evenement[]>{
    return this.http.get<Evenement[]>('http://localhost:8000/api/getAllEvenements');
  }

}
