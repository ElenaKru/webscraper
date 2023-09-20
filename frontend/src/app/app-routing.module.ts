import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './home/home.component';

const routes: Routes = [
  { path: '', component: HomeComponent }, // Home route
  { path: '', redirectTo: '/home', pathMatch: 'full' }, // Redirect to the default route
  { path: 'home', component: HomeComponent }, // Use your custom component name
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }


// const routes: Routes = [

// ];
