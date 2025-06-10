import { EvenementCategoryEnum } from "./evenementCategoryEnum";

export interface EvenementFilters {
    location: string;
    date:number;
    priceMax:number;
    category:EvenementCategoryEnum
}
