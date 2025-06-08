import { EvenementCategoryEnum } from "./evenementCategoryEnum";

export interface Evenement {
  id: number;
  title: string;
  description: string;
  evenementDate: Date;
  evenementHour:Date;
  location: string;
  category: EvenementCategoryEnum;
  maxCapacity: number;
  organizerId: number;
  price:number;
}
