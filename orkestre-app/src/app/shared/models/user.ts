import { UserRole } from "./userRole";

export interface User {
  id: number;
  firstName: string;
  lastName: string;
  email: string;
  picture: string;
  role: UserRole;
}
