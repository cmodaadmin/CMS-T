import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VendorPortfolio } from './vendor-portfolio';

describe('VendorPortfolio', () => {
  let component: VendorPortfolio;
  let fixture: ComponentFixture<VendorPortfolio>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [VendorPortfolio]
    })
    .compileComponents();

    fixture = TestBed.createComponent(VendorPortfolio);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
