import { ComponentFixture, TestBed } from '@angular/core/testing';

import { VendorDirectory } from './vendor-directory';

describe('VendorDirectory', () => {
  let component: VendorDirectory;
  let fixture: ComponentFixture<VendorDirectory>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [VendorDirectory]
    })
    .compileComponents();

    fixture = TestBed.createComponent(VendorDirectory);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
