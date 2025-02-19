import React from 'react';
import { Box, Typography, Button, Container, Grid, IconButton, Paper } from '@mui/material';
import { styled } from '@mui/system';
import { Link } from 'react-router-dom';
import BusinessCenterIcon from '@mui/icons-material/BusinessCenter';
import SchoolIcon from '@mui/icons-material/School';
import PeopleIcon from '@mui/icons-material/People';
import VerifiedIcon from '@mui/icons-material/Verified';
import backgroundImg from '../../assets/bg1.jpg';
import Navbar from './Navbar';
import Footer from './Footer';


// Styled Components
const ParallaxWrapper = styled(Box)({
  position: 'relative',
  height: '100vh',
  backgroundAttachment: 'fixed',
  backgroundSize: 'cover',
  backgroundPosition: 'center',
  backgroundImage: url(${backgroundImg})`,
  color: 'white',
});

const HeroSection = styled(Box)({
  position: 'absolute',
  top: '50%',
  left: '50%',
  transform: 'translate(-50%, -50%)',
  textAlign: 'center',
  zIndex: 10,
  padding: '2rem',
  backdropFilter: 'blur(10px)',
  backgroundColor: 'rgba(0, 0, 0, 0.6)',
  borderRadius: '15px',
});

const SectionHeader = styled(Typography)({
  fontSize: '2.5rem',
  color: '#fff',
  textTransform: 'uppercase',
  fontWeight: 'bold',
  marginBottom: '2rem',
  letterSpacing: '1px',
});

const CTAButton = styled(Button)({
  backgroundColor: '#0073E6',
  color: 'white',
  padding: '1rem 3rem',
  fontSize: '1.2rem',
  fontWeight: 'bold',
  borderRadius: '50px',
  textTransform: 'uppercase',
  boxShadow: '0 4px 15px rgba(0, 0, 0, 0.2)',
  '&:hover': {
    backgroundColor: '#005bb5',
    transform: 'scale(1.1)',
  },
  transition: 'transform 0.3s ease',
});

const FeatureSection = styled(Box)({
  padding: '5rem 0',
  backgroundColor: '#212121',
  textAlign: 'center',
});

const FeatureCard = styled(Paper)({
  padding: '2rem',
  backgroundColor: '#333',
  color: '#fff',
  borderRadius: '15px',
  boxShadow: '0 4px 15px rgba(0, 0, 0, 0.3)',
  transition: '0.3s ease',
  '&:hover': {
    transform: 'scale(1.05)',
  },
});

const FeatureIconButton = styled(IconButton)({
  backgroundColor: '#FF9800',
  color: 'white',
  padding: '1rem',
  borderRadius: '50%',
  marginBottom: '1.5rem',
  transition: '0.3s ease',
  '&:hover': {
    backgroundColor: '#e68900',
    transform: 'scale(1.1)',
  },
});

const ParallaxSection = styled(Box)({
  backgroundColor: '#1a1a1a',
  color: 'white',
  padding: '10rem 2rem',
  textAlign: 'center',
  position: 'relative',
  zIndex: 5,
});

const UserHome = () => {
  return (
    <>
      <Navbar />
      <Box>
        <ParallaxWrapper>
          <HeroSection>
            <SectionHeader variant="h4">Connecting Talent with Opportunity</SectionHeader>
            <Typography variant="h5" sx={{ marginBottom: '1.5rem' }}>
              Your gateway to career success and top recruitment opportunities.
            </Typography>
            <CTAButton component={Link} to="/jobs">Explore Jobs</CTAButton>
          </HeroSection>
        </ParallaxWrapper>

        {/* Features Section */}
        <FeatureSection>
          <SectionHeader>Why Choose Our Campus Recruitment System?</SectionHeader>
          <Grid container spacing={4} justifyContent="center">
            <Grid item xs={12} sm={6} md={3}>
              <FeatureCard>
                <FeatureIconButton>
                  <BusinessCenterIcon />
                </FeatureIconButton>
                <Typography variant="h6" sx={{ fontWeight: 'bold' }}>
                  Job Listings
                </Typography>
                <Typography variant="body1">
                  Browse the latest job openings from top companies.
                </Typography>
              </FeatureCard>
            </Grid>
            <Grid item xs={12} sm={6} md={3}>
              <FeatureCard>
                <FeatureIconButton>
                  <SchoolIcon />
                </FeatureIconButton>
                <Typography variant="h6" sx={{ fontWeight: 'bold' }}>
                  Internships
                </Typography>
                <Typography variant="body1">
                  Find internships to gain real-world experience.
                </Typography>
              </FeatureCard>
            </Grid>
            <Grid item xs={12} sm={6} md={3}>
              <FeatureCard>
                <FeatureIconButton>
                  <PeopleIcon />
                </FeatureIconButton>
                <Typography variant="h6" sx={{ fontWeight: 'bold' }}>
                  Career Counseling
                </Typography>
                <Typography variant="body1">
                  Get expert guidance to shape your future career path.
                </Typography>
              </FeatureCard>
            </Grid>
            <Grid item xs={12} sm={6} md={3}>
              <FeatureCard>
                <FeatureIconButton>
                  <VerifiedIcon />
                </FeatureIconButton>
                <Typography variant="h6" sx={{ fontWeight: 'bold' }}>
                  Verified Employers
                </Typography>
                <Typography variant="body1">
                  Connect with trusted and verified companies.
                </Typography>
              </FeatureCard>
            </Grid>
          </Grid>
        </FeatureSection>

        {/* Parallax Section */}
        <ParallaxSection>
          <SectionHeader>Start Your Career Journey Today</SectionHeader>
          <Typography variant="h6" sx={{ marginBottom: '2rem' }}>
            Sign up now and unlock endless career opportunities.
          </Typography>
          <CTAButton component={Link} to="/register">Get Started</CTAButton>
        </ParallaxSection>

        <Footer />
      </Box>
    </>
  );
};

export default UserHome;
