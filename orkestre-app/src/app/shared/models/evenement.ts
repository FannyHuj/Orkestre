import { EvenementCategory } from "./evenementCategory";

export interface Evenement {
  id: number;
  title: string;
  description: string;
  evenementDate: Date;
  location: string;
  category: EvenementCategory;
  maxCapacity: number;
  organizerId: number;
  price:number;
}
