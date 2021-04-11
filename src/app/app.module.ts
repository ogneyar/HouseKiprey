import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations'

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HouseKipreyComponent } from './house-kiprey/house-kiprey.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { HeaderComponent } from './house-kiprey/header/header.component';
import { FooterComponent } from './house-kiprey/footer/footer.component';
import { HomeTopComponent } from './house-kiprey/home-top/home-top.component';
import { HomeFormComponent } from './house-kiprey/home-form/home-form.component';
import { HomeAboutComponent } from './house-kiprey/home-about/home-about.component';
import { HomeCoOpComponent } from './house-kiprey/home-co-op/home-co-op.component';
import { HomePurposeComponent } from './house-kiprey/home-purpose/home-purpose.component';
import { ReviewsComponent } from './reviews/reviews.component';
import { BenefitsComponent } from './benefits/benefits.component';
import { PositiveComponent } from './positive/positive.component';
import { HowToComponent } from './how-to/how-to.component';
import { TestsComponent } from './tests/tests.component';
import { FeedbackComponent } from './feedback/feedback.component';
import { ConsultantComponent } from './house-kiprey/consultant/consultant.component';
import { FormsModule } from '@angular/forms';

@NgModule({
  declarations: [
    AppComponent,
    PageNotFoundComponent,
    HouseKipreyComponent,
    HeaderComponent,
    FooterComponent,
    HomeTopComponent,
    HomeFormComponent,
    HomeAboutComponent,
    HomeCoOpComponent,
    HomePurposeComponent,
    ReviewsComponent,
    BenefitsComponent,
    PositiveComponent,
    HowToComponent,
    TestsComponent,
    FeedbackComponent,
    ConsultantComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
