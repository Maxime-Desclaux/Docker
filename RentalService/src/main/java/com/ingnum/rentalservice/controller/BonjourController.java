package com.ingnum.rentalservice.controller;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.client.RestTemplate;

@RestController
@RequestMapping("/customer")
public class BonjourController {

    @Value("${customer.service.url}")
    private String customerServiceUrl;

    private final RestTemplate restTemplate = new RestTemplate();

    @GetMapping("/{name}")
    public String bonjour(@PathVariable String name) {
        return restTemplate.getForObject(
            customerServiceUrl + "/index.php/customer/" + name,
            String.class
        );
    }
}
